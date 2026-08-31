<?php

declare(strict_types=1);

/*
 * Copyright 2017 Aaron Scherer
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 *
 * @package     restcord/restcord
 * @copyright   Aaron Scherer 2017
 * @license     MIT
 */

namespace RestCord\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\NullLogger;
use RestCord\DiscordClient;
use RestCord\Exception\DiscordRequestException;
use RestCord\Generated\GatewayApi;
use RestCord\Generated\GuildsApi;
use RestCord\Generated\InvitesApi;
use RestCord\RateLimit\Provider\MemoryRateLimitProvider;
use RestCord\RateLimit\Provider\RateLimitProviderInterface;
use RestCord\RateLimit\Provider\RedisRateLimitProvider;
use RestCord\RateLimit\RateLimiter;
use RestCord\RateLimit\RatelimitException;
use RestCord\RateLimit\RateLimitReservation;
use RestCord\ResourceClient;

final class ResourceClientTest extends TestCase
{
    public function testGeneratedCategoriesAreLazyAndCached(): void
    {
        $client = new DiscordClient();

        self::assertInstanceOf(GuildsApi::class, $client->guilds);
        self::assertSame($client->guilds, $client->guilds);
    }

    public function testUnknownCategoryThrowsBeforeARequest(): void
    {
        $client = new DiscordClient();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown Discord category: missing');

        $client->missing;
    }

    public function testDiscordClientDefaultsToNullLogger(): void
    {
        $client   = new DiscordClient();
        $resource = (new \ReflectionProperty($client, 'resourceClient'))->getValue($client);

        self::assertInstanceOf(NullLogger::class, (new \ReflectionProperty($resource, 'logger'))->getValue($resource));
    }

    public function testDiscordClientOwnsTheTransportAndRunsMiddleware(): void
    {
        $requests        = [];
        $middlewareCalls = 0;
        $handler         = static function ($request, array $options) use (&$requests): PromiseInterface {
            $requests[] = [$request, $options];

            return Create::promiseFor(new Response(200, [], '{"url":"wss://gateway.discord.gg"}'));
        };
        $middleware = static function (callable $next) use (&$middlewareCalls): callable {
            return static function ($request, array $options) use ($next, &$middlewareCalls): PromiseInterface {
                $middlewareCalls++;

                return $next($request, $options);
            };
        };
        $client = new DiscordClient([
            'token'             => 'top-secret',
            'guzzleOptions'     => ['timeout' => 1],
            'middleware'        => [$middleware],
            'rateLimitProvider' => new MemoryRateLimitProvider(),
            'throwOnRatelimit'  => true,
            'httpHandler'       => $handler,
            'globalRateLimit'   => 60,
        ]);

        self::assertSame(['url' => 'wss://gateway.discord.gg'], $client->gateway->getGateway());
        self::assertSame(1, $middlewareCalls);
        self::assertSame('https://discord.com/api/v10/gateway', (string) $requests[0][0]->getUri());
        self::assertSame('Bot top-secret', $requests[0][0]->getHeaderLine('Authorization'));
        self::assertSame(1, $requests[0][1]['timeout']);
        self::assertSame(
            'DiscordBot (https://github.com/restcord/restcord, '.\Composer\InstalledVersions::getPrettyVersion('restcord/restcord').')',
            $requests[0][0]->getHeaderLine('User-Agent')
        );
    }

    public function testMandatoryRateLimiterWrapsAndReplaysEveryUserMiddlewareSend(): void
    {
        $provider = new class() implements RateLimitProviderInterface {
            public array $reservations = [];
            public int $updates        = 0;

            public function reserve(string $method, string $route, string $majorScope, bool $interaction, string $globalScope, int $globalLimit, float $minimumDelay = 0.0, bool $rejectDelayed = false): RateLimitReservation
            {
                $this->reservations[] = func_get_args();

                return new RateLimitReservation(microtime(true) + $minimumDelay, true);
            }

            public function updateFromResponse(string $method, string $route, string $majorScope, bool $interaction, string $globalScope, ResponseInterface $response): void
            {
                $this->updates++;
            }
        };
        $sentBodies = [];
        $client     = new DiscordClient([
            'token'             => 'bot-secret',
            'rateLimitProvider' => $provider,
            'globalRateLimit'   => 60,
            'middleware'        => [static fn (callable $next): callable => static function ($request, array $options) use ($next): PromiseInterface {
                return $next($request, $options)->then(static fn (): PromiseInterface => $next($request, $options));
            }],
            'httpHandler' => static function ($request) use (&$sentBodies): PromiseInterface {
                $sentBodies[] = $request->getBody()->getContents();

                return Create::promiseFor(new Response(200, [], '{}'));
            },
        ]);

        self::assertSame([], $client->channels->createMessage([
            'channel_id' => 1,
            'body'       => [
                'content'  => 'hello',
                'files[0]' => [
                    'contents' => new NoSeekStream(Utils::streamFor('file-data')),
                    'filename' => 'file.txt',
                ],
            ],
        ]));
        self::assertSame([
            ['POST', '/channels/{channel_id}/messages', 'channel_id=1', false, hash('sha256', 'bot-secret'), 60, 0.0, false],
            ['POST', '/channels/{channel_id}/messages', 'channel_id=1', false, hash('sha256', 'bot-secret'), 60, 0.0, false],
        ], $provider->reservations);
        self::assertSame(2, $provider->updates);
        self::assertCount(2, $sentBodies);
        self::assertSame($sentBodies[0], $sentBodies[1]);
        self::assertStringContainsString('file-data', $sentBodies[0]);
    }

    public function testDiscordClientRejectsInvalidOptions(): void
    {
        $validHandler    = static fn (): PromiseInterface => Create::promiseFor(new Response());
        $validMiddleware = static fn (callable $next): callable => $next;
        $invalidOptions  = [
            ['unknown' => true],
            ['token'             => true],
            ['tokenType'         => 1],
            ['tokenType'         => 'Bearer'],
            ['logger'            => new \stdClass()],
            ['guzzleOptions'     => true],
            ['guzzleOptions'     => ['base_uri' => 'https://example.com']],
            ['guzzleOptions'     => ['handler' => $validHandler]],
            ['guzzleOptions'     => ['headers' => []]],
            ['guzzleOptions'     => ['auth' => ['top-secret']]],
            ['guzzleOptions'     => ['http_errors' => true]],
            ['middleware'        => true],
            ['middleware'        => [new \stdClass()]],
            ['rateLimitProvider' => new \stdClass()],
            ['throwOnRatelimit'  => 1],
            ['httpHandler'       => true],
            ['globalRateLimit'   => '50'],
            ['globalRateLimit'   => 0],
        ];

        foreach ($invalidOptions as $options) {
            try {
                new DiscordClient($options);
                self::fail('Expected invalid Discord client options to reject.');
            } catch (\InvalidArgumentException) {
                self::assertTrue(true);
            }
        }

        new DiscordClient(['middleware' => [$validMiddleware], 'httpHandler' => $validHandler]);
        new DiscordClient([
            'rateLimitProvider' => new class() implements RateLimitProviderInterface {
                public function reserve(string $method, string $route, string $majorScope, bool $interaction, string $globalScope, int $globalLimit, float $minimumDelay = 0.0, bool $rejectDelayed = false): RateLimitReservation
                {
                    return new RateLimitReservation(microtime(true) + $minimumDelay, true);
                }

                public function updateFromResponse(string $method, string $route, string $majorScope, bool $interaction, string $globalScope, ResponseInterface $response): void
                {
                }
            },
            'httpHandler' => $validHandler,
        ]);
        self::assertTrue(true);
    }

    public function testDiscordClientLogsOnlyOperationAndStatus(): void
    {
        $logs   = [];
        $logger = new class($logs) extends \Psr\Log\AbstractLogger {
            public function __construct(private array &$logs)
            {
            }

            public function log($level, string|\Stringable $message, array $context = []): void
            {
                $this->logs[] = [$level, (string) $message, $context];
            }
        };
        $client = new DiscordClient([
            'token'       => 'top-secret',
            'logger'      => $logger,
            'httpHandler' => static fn (): PromiseInterface => Create::promiseFor(new Response(400, [], '{"message":"webhook-secret"}')),
        ]);

        try {
            $client->gateway->getGateway();
            self::fail('Expected a Discord error.');
        } catch (DiscordRequestException) {
            self::assertSame([['info', 'Discord response received.', ['operationId' => 'get_gateway', 'status' => 400]]], $logs);
            self::assertStringNotContainsString('top-secret', json_encode($logs, JSON_THROW_ON_ERROR));
            self::assertStringNotContainsString('webhook-secret', json_encode($logs, JSON_THROW_ON_ERROR));
        }
    }

    public function testRateLimitMetadataHashesAuthAndWebhookTokens(): void
    {
        $captured = [];
        $http     = new Client([
            'base_uri' => 'https://discord.com/api/v10/',
            'handler'  => static function ($request, array $options) use (&$captured): PromiseInterface {
                $captured = $options[RateLimiter::OPTION];

                return Create::promiseFor(new Response(200, [], '{}'));
            },
        ]);
        $client = new ResourceClient([
            'execute_webhook' => [
                'httpMethod' => 'POST',
                'path'       => '/webhooks/{webhook_id}/{webhook_token}',
                'parameters' => [
                    ['name' => 'webhook_id', 'location' => 'path', 'required' => true],
                    ['name' => 'webhook_token', 'location' => 'path', 'required' => true],
                ],
                'responses'        => [200 => 'json'],
                'security'         => [['BotToken' => []]],
                'interactionRoute' => false,
                'majorParameters'  => ['webhook_id', 'webhook_token'],
            ],
        ], $http, 'bot-secret');

        $client->requestAsync('execute_webhook', ['webhook_id' => '123', 'webhook_token' => 'webhook-secret'])->wait();

        self::assertSame([
            'operationId'      => 'execute_webhook',
            'method'           => 'POST',
            'route'            => '/webhooks/{webhook_id}/{webhook_token}',
            'interactionRoute' => false,
            'majorScope'       => 'webhook_id=123|webhook_token='.hash('sha256', 'webhook-secret'),
            'globalScope'      => hash('sha256', 'bot-secret'),
        ], $captured);
        self::assertStringNotContainsString('bot-secret', json_encode($captured, JSON_THROW_ON_ERROR));
        self::assertStringNotContainsString('webhook-secret', json_encode($captured, JSON_THROW_ON_ERROR));
    }

    public function testAnonymousInteractionMetadataDoesNotExposeItsToken(): void
    {
        $captured = [];
        $http     = new Client([
            'base_uri' => 'https://discord.com/api/v10/',
            'handler'  => static function ($request, array $options) use (&$captured): PromiseInterface {
                $captured = $options[RateLimiter::OPTION];

                return Create::promiseFor(new Response(204));
            },
        ]);
        $client = new ResourceClient([
            'create_interaction_response' => [
                'httpMethod' => 'POST',
                'path'       => '/interactions/{interaction_id}/{interaction_token}/callback',
                'parameters' => [
                    ['name' => 'interaction_id', 'location' => 'path', 'required' => true],
                    ['name' => 'interaction_token', 'location' => 'path', 'required' => true],
                ],
                'responses'        => [204 => 'empty'],
                'security'         => [[]],
                'interactionRoute' => true,
                'majorParameters'  => [],
            ],
        ], $http);

        $client->requestAsync('create_interaction_response', [
            'interaction_id'    => '123',
            'interaction_token' => 'interaction-secret',
        ])->wait();

        self::assertTrue($captured['interactionRoute']);
        self::assertSame('', $captured['majorScope']);
        self::assertSame('anonymous', $captured['globalScope']);
        self::assertStringNotContainsString('interaction-secret', json_encode($captured, JSON_THROW_ON_ERROR));
    }

    public function testRateLimitMajorScopeSeparatesChannelIds(): void
    {
        $captured = [];
        $http     = new Client([
            'base_uri' => 'https://discord.com/api/v10/',
            'handler'  => static function ($request, array $options) use (&$captured): PromiseInterface {
                $captured[] = $options[RateLimiter::OPTION]['majorScope'];

                return Create::promiseFor(new Response(200, [], '{}'));
            },
        ]);
        $operation = [
            'httpMethod'       => 'GET',
            'path'             => '/channels/{channel_id}',
            'parameters'       => [['name' => 'channel_id', 'location' => 'path', 'required' => true]],
            'responses'        => [200 => 'json'],
            'security'         => [[]],
            'interactionRoute' => false,
            'majorParameters'  => ['channel_id'],
        ];
        $client = new ResourceClient(['get_channel' => $operation], $http);

        $client->requestAsync('get_channel', ['channel_id' => '1'])->wait();
        $client->requestAsync('get_channel', ['channel_id' => '2'])->wait();

        self::assertSame(['channel_id=1', 'channel_id=2'], $captured);
    }

    public function testRedisRateLimitProviderValidatesOptionsWithoutOptionsResolver(): void
    {
        $provider = (new \ReflectionClass(RedisRateLimitProvider::class))->newInstanceWithoutConstructor();

        self::assertSame(
            ['prefix' => 'rate.', 'host' => 'redis', 'port' => 6380, 'client' => null],
            $provider->validateOptions(['prefix' => 'rate.', 'host' => 'redis', 'port' => 6380])
        );

        foreach ([['unknown' => true], ['prefix' => 1], ['host' => 1], ['port' => '6380'], ['client' => new \stdClass()]] as $options) {
            try {
                $provider->validateOptions($options);
                self::fail('Expected invalid Redis rate limit options to reject.');
            } catch (\InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
    }

    public function testRegistrySerializerTuplesUseTheWireFormat(): void
    {
        [$oauth, $oauthHistory] = $this->generatedClient([new Response(200, [], '{}')], 'oauth-token', 'OAuth');
        [$bot, $botHistory]     = $this->generatedClient([new Response(200, [], '{}')], 'bot-token');

        $oauth->requestAsync('get_current_user_application_entitlements', [
            'application_id'   => 'a/b',
            'sku_ids'          => ['one', 'two'],
            'exclude_consumed' => false,
        ])->wait();
        $bot->requestAsync('create_channel_invite', [
            'channel_id'       => '1',
            'audit_log_reason' => 'for béa',
            'body'             => [],
        ])->wait();

        self::assertSame('/api/v10/users/@me/applications/a%2Fb/entitlements', $oauthHistory->transactions[0]['request']->getUri()->getPath());
        self::assertSame('sku_ids=one&sku_ids=two&exclude_consumed=false', $oauthHistory->transactions[0]['request']->getUri()->getQuery());
        self::assertSame('for%20b%C3%A9a', $botHistory->transactions[0]['request']->getHeaderLine('X-Audit-Log-Reason'));
    }

    public function testRegistryRequestMediaTypesUseJsonOrMultipart(): void
    {
        $registry   = require __DIR__.'/../src/Resources/operations-v10.php';
        $mediaTypes = [];
        foreach ($registry['operations'] as $operation) {
            foreach ($operation['requestBody']['mediaTypes'] ?? [] as $mediaType) {
                $mediaTypes[$mediaType] = true;
            }
        }
        [$client, $history] = $this->generatedClient([new Response(200, [], '{}')], 'bot-token');

        $client->requestAsync('create_channel_invite', ['channel_id' => '1', 'body' => ['content' => 'hello']])->wait();

        self::assertSame(['application/json', 'multipart/form-data', 'application/x-www-form-urlencoded'], array_keys($mediaTypes));
        self::assertSame('application/json', $history->transactions[0]['request']->getHeaderLine('Content-Type'));
        self::assertSame('{"content":"hello"}', (string) $history->transactions[0]['request']->getBody());
    }

    public function testMultipartOnlyRegistryOperationUsesLocalFilenameAndDefaultContentType(): void
    {
        [$client, $history] = $this->generatedClient([new Response(200, [], '{}')], 'bot-token');
        $file               = fopen(__FILE__, 'r');

        try {
            $client->requestAsync('upload_application_attachment', [
                'application_id' => '1',
                'body'           => ['file' => ['contents' => $file]],
            ])->wait();
            $request     = $history->transactions[0]['request'];
            $contentType = $request->getHeaderLine('Content-Type');
            $body        = (string) $request->getBody();
        } finally {
            fclose($file);
        }

        self::assertStringStartsWith('multipart/form-data; boundary=', $contentType);
        self::assertStringContainsString('filename="ResourceClientTest.php"', $body);
        self::assertStringContainsString('Content-Type: application/octet-stream', $body);
    }

    public function testMultipartWireBodyUsesPayloadJsonAndDescriptors(): void
    {
        [$client, $history] = $this->client([
            'requestBody' => [
                'required'     => true,
                'mediaTypes'   => ['application/json', 'multipart/form-data'],
                'binaryFields' => ['files[0]'],
                'payloadJson'  => true,
            ],
            'security' => [[]],
        ]);

        $client->requestAsync('test', ['body' => [
            'content'  => 'hello',
            'files[0]' => ['contents' => 'file', 'filename' => 'example.txt', 'content_type' => 'text/plain'],
        ]])->wait();

        $request = $history->transactions[0]['request'];
        preg_match('/boundary=(.+)$/', $request->getHeaderLine('Content-Type'), $matches);
        $boundary = $matches[1];
        $expected = "--{$boundary}\r\nContent-Type: application/json\r\nContent-Disposition: form-data; name=\"payload_json\"\r\n\r\n{\"content\":\"hello\"}\r\n--{$boundary}\r\nContent-Type: text/plain\r\nContent-Disposition: form-data; name=\"files[0]\"; filename=\"example.txt\"\r\n\r\nfile\r\n--{$boundary}--\r\n";

        self::assertSame($expected, (string) $request->getBody());
    }

    public function testRegistrySecurityAlternativesUseAcceptedAuthentication(): void
    {
        [$bot, $botHistory]                 = $this->generatedClient([new Response(200, [], '{}')], 'bot-token');
        [$oauth, $oauthHistory]             = $this->generatedClient([new Response(200, [], '{}')], 'oauth-token', 'OAuth');
        [$anonymous, $anonymousHistory]     = $this->generatedClient([new Response(200, [], '{}')]);
        [$eitherBot, $eitherBotHistory]     = $this->generatedClient([new Response(200, [], '{}')], 'bot-token');
        [$eitherOauth, $eitherOauthHistory] = $this->generatedClient([new Response(200, [], '{}')], 'oauth-token', 'OAuth');

        $bot->requestAsync('get_my_application')->wait();
        $oauth->requestAsync('get_current_user_application_entitlements', ['application_id' => '1'])->wait();
        $anonymous->requestAsync('get_gateway')->wait();
        $eitherBot->requestAsync('list_guild_channels', ['guild_id' => '1'])->wait();
        $eitherOauth->requestAsync('list_guild_channels', ['guild_id' => '1'])->wait();

        self::assertSame('Bot bot-token', $botHistory->transactions[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bearer oauth-token', $oauthHistory->transactions[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('', $anonymousHistory->transactions[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bot bot-token', $eitherBotHistory->transactions[0]['request']->getHeaderLine('Authorization'));
        self::assertSame('Bearer oauth-token', $eitherOauthHistory->transactions[0]['request']->getHeaderLine('Authorization'));
    }

    public function testRegistryRejectsTheWrongAuthenticationScheme(): void
    {
        foreach ([
            ['get_my_application', 'oauth-token', 'OAuth', []],
            ['get_current_user_application_entitlements', 'bot-token', 'Bot', ['application_id' => '1']],
        ] as [$operationId, $token, $tokenType, $options]) {
            [$client, $history] = $this->generatedClient([], $token, $tokenType);

            try {
                $client->requestAsync($operationId, $options)->wait();
                self::fail('Expected the authentication scheme to reject.');
            } catch (\InvalidArgumentException) {
                self::assertSame([], $history->transactions);
            }
        }
    }

    public function testMultipartDescriptorValidationRejectsMissingFilename(): void
    {
        [$client] = $this->client([
            'requestBody' => ['required' => true, 'mediaTypes' => ['multipart/form-data'], 'binaryFields' => ['file']],
            'security'    => [[]],
        ]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Multipart filename is required');

        $client->requestAsync('test', ['body' => ['file' => ['contents' => 'content']]])->wait();
    }

    public function testUnknownAndRequiredOptionsRejectBeforeDispatch(): void
    {
        $dispatched = false;
        $http       = new Client([
            'base_uri' => 'https://discord.com/api/v10/',
            'handler'  => static function () use (&$dispatched): PromiseInterface {
                $dispatched = true;

                return Create::promiseFor(new Response());
            },
        ]);
        $client = new ResourceClient([
            'test' => [
                'httpMethod'  => 'POST',
                'path'        => '/guilds/{guild_id}',
                'parameters'  => [['name' => 'guild_id', 'location' => 'path', 'required' => true, 'style' => 'simple', 'explode' => false]],
                'requestBody' => ['required' => true, 'mediaTypes' => ['application/json']],
                'security'    => [[]],
            ],
        ], $http);

        foreach ([[], ['guild_id' => '1'], ['guild_id' => '1', 'body' => [], 'extra' => true]] as $options) {
            try {
                $client->requestAsync('test', $options)->wait();
                self::fail('Expected local validation to reject the request.');
            } catch (\InvalidArgumentException) {
                self::assertFalse($dispatched);
            }
        }
    }

    public function testUnknownOperationAndMissingAuthenticationRejectBeforeDispatch(): void
    {
        $dispatched = false;
        $http       = new Client([
            'base_uri' => 'https://discord.com/api/v10/',
            'handler'  => static function () use (&$dispatched): PromiseInterface {
                $dispatched = true;

                return Create::promiseFor(new Response());
            },
        ]);
        $client = new ResourceClient([
            'protected' => ['httpMethod' => 'GET', 'path' => '/protected', 'parameters' => [], 'security' => [['BotToken' => []]]],
        ], $http);

        foreach (['missing', 'protected'] as $operationId) {
            try {
                $client->requestAsync($operationId)->wait();
                self::fail('Expected local validation to reject the request.');
            } catch (\InvalidArgumentException) {
                self::assertFalse($dispatched);
            }
        }
    }

    public function testJsonResponsesDecodeEveryJsonValue(): void
    {
        foreach ([
            ['{"name":"restcord"}', ['name' => 'restcord']],
            ['[1,"restcord"]', [1, 'restcord']],
            ['42', 42],
            ['true', true],
            ['null', null],
        ] as [$body, $expected]) {
            [$client] = $this->client(['security' => [[]]], null, 'Bot', new Response(200, [], $body));

            self::assertSame($expected, $client->requestAsync('test')->wait());
        }
    }

    public function testRegistryResponseCodecsDecodeJsonEmptyAndStreams(): void
    {
        $stream   = Utils::streamFor("\x89PNG");
        [$client] = $this->generatedClient([
            new Response(200, [], '{"url":"wss://gateway.discord.gg"}'),
            new Response(204),
            new Response(200, [], $stream),
        ], 'bot-token');

        self::assertSame(['url' => 'wss://gateway.discord.gg'], $client->requestAsync('get_gateway')->wait());
        self::assertNull($client->requestAsync('delete_application_command', ['application_id' => '1', 'command_id' => '2'])->wait());
        self::assertSame($stream, $client->requestAsync('get_guild_widget_png', ['guild_id' => '1'])->wait());
    }

    public function testGeneratedApisReturnOriginalPngAndCsvStreams(): void
    {
        $png      = Utils::streamFor("\x89PNG");
        $csv      = Utils::streamFor("id,name\n1,restcord\n");
        [$client] = $this->generatedClient([
            new Response(200, [], $png),
            new Response(200, [], $csv),
        ], 'token');

        self::assertSame($png, (new GuildsApi($client))->getGuildWidgetPngAsync(['guild_id' => '1'])->wait());
        self::assertSame($csv, (new InvitesApi($client))->getInviteTargetUsersAsync(['code' => 'code'])->wait());
    }

    public function testGeneratedAsyncAndSyncErrorsCarryDiscordFields(): void
    {
        $response   = new Response(400, [], '{"code":50035,"message":"Invalid Form Body","errors":{"name":{"_errors":[{"code":"BASE_TYPE_REQUIRED"}]}}}');
        [$client]   = $this->generatedClient([$response, $response], 'token');
        $api        = new GatewayApi($client);
        $exceptions = [];

        foreach ([false, true] as $sync) {
            try {
                $sync ? $api->getGateway() : $api->getGatewayAsync()->wait();
                self::fail('Expected the request to reject.');
            } catch (DiscordRequestException $exception) {
                $exceptions[] = $exception;
            }
        }

        foreach ($exceptions as $exception) {
            self::assertSame(400, $exception->getStatusCode());
            self::assertSame(50035, $exception->getDiscordCode());
            self::assertSame('Invalid Form Body', $exception->getDiscordMessage());
            self::assertSame(['name' => ['_errors' => [['code' => 'BASE_TYPE_REQUIRED']]]], $exception->getErrors());
            self::assertSame($response, $exception->getResponse());
        }
    }

    public function testMalformedDiscordErrorKeepsTheOriginalResponse(): void
    {
        $response = new Response(502, [], '{');
        [$client] = $this->generatedClient([$response]);

        try {
            (new GatewayApi($client))->getGatewayAsync()->wait();
            self::fail('Expected the request to reject.');
        } catch (DiscordRequestException $exception) {
            self::assertSame(502, $exception->getStatusCode());
            self::assertSame('Bad Gateway', $exception->getMessage());
            self::assertNull($exception->getDiscordCode());
            self::assertNull($exception->getDiscordMessage());
            self::assertNull($exception->getErrors());
            self::assertSame($response, $exception->getResponse());
        }
    }

    public function testGeneratedSyncAndAsyncResultsMatch(): void
    {
        $body     = '{"url":"wss://gateway.discord.gg"}';
        [$client] = $this->generatedClient([new Response(200, [], $body), new Response(200, [], $body)]);
        $api      = new GatewayApi($client);

        self::assertSame($api->getGatewayAsync()->wait(), $api->getGateway());
    }

    public function testGeneratedSyncAndAsyncRateLimitExceptionsMatch(): void
    {
        $response   = new Response(429, [], '{"retry_after":0.125,"message":"response-secret"}');
        $exceptions = [];

        foreach ([false, true] as $sync) {
            $client = new DiscordClient([
                'throwOnRatelimit' => true,
                'httpHandler'      => static fn (): PromiseInterface => Create::promiseFor($response),
            ]);

            try {
                $sync ? $client->gateway->getGateway() : $client->gateway->getGatewayAsync()->wait();
                self::fail('Expected the request to reject.');
            } catch (RatelimitException $exception) {
                $exceptions[] = $exception;
            }
        }

        foreach ($exceptions as $exception) {
            self::assertSame('get_gateway', $exception->getOperationId());
            self::assertSame(0.125, $exception->getRetryAfter());
            self::assertSame($response, $exception->getResponse());
            self::assertStringNotContainsString('response-secret', $exception->getMessage());
            self::assertStringNotContainsString('discord.com', $exception->getMessage());
        }
    }

    public function testAsyncRequestsCanRemainInFlightTogether(): void
    {
        $pending = [];
        $client  = new DiscordClient([
            'httpHandler' => static function () use (&$pending): PromiseInterface {
                return $pending[] = new Promise();
            },
        ]);

        $first  = $client->gateway->getGatewayAsync();
        $second = $client->gateway->getGatewayAsync();

        self::assertCount(2, $pending);
        $pending[0]->resolve(new Response(200, [], '{"id":1}'));
        $pending[1]->resolve(new Response(200, [], '{"id":2}'));
        self::assertSame(['id' => 1], $first->wait());
        self::assertSame(['id' => 2], $second->wait());
    }

    public function testActiveAsyncPathDoesNotBlockWithSleep(): void
    {
        $source = file_get_contents(__DIR__.'/../src/ResourceClient.php')
            .file_get_contents(__DIR__.'/../src/DiscordClient.php')
            .file_get_contents(__DIR__.'/../src/RateLimit/RateLimiter.php');

        self::assertDoesNotMatchRegularExpression('/\\b(?:sleep|usleep)\\s*\\(/', $source);
    }

    public function testEveryRegistryOperationBuildsARequest(): void
    {
        $registry = require __DIR__.'/../src/Resources/operations-v10.php';
        $built    = 0;

        foreach ($registry['operations'] as $operationId => $operation) {
            $security  = array_merge(...array_map('array_keys', $operation['security'] ?? [[]]));
            $tokenType = in_array('BotToken', $security, true) ? 'Bot' : 'OAuth';
            $token     = $security === [] ? null : 'token';
            $status    = (int) array_key_first($operation['responses']);
            $body      = $operation['responses'][$status] === 'json' ? '{}' : '';
            $http      = new Client([
                'base_uri' => 'https://discord.com/api/v10/',
                'handler'  => static function () use (&$built, $status, $body): PromiseInterface {
                    $built++;

                    return Create::promiseFor(new Response($status, [], $body));
                },
            ]);
            $client = new ResourceClient([$operationId => $operation], $http, $token, $tokenType);

            $client->requestAsync($operationId, $this->requiredOptions($operation))->wait();
        }

        self::assertSame(count($registry['operations']), $built);
    }

    public function testMalformedJsonRejectsAsyncAndSyncGeneratedCalls(): void
    {
        foreach ([false, true] as $sync) {
            [$client] = $this->generatedClient([new Response(200, [], '{')]);
            $api      = new GatewayApi($client);

            try {
                $sync ? $api->getGateway() : $api->getGatewayAsync()->wait();
                self::fail('Expected malformed JSON to reject.');
            } catch (\JsonException) {
                self::assertTrue(true);
            }
        }
    }

    public function testUnexpectedSuccessStatusRejects(): void
    {
        [$client] = $this->client([
            'responses' => [200 => 'json'],
            'security'  => [[]],
        ], null, 'Bot', new Response(201, [], '{}'));

        $this->expectException(\UnexpectedValueException::class);
        $client->requestAsync('test')->wait();
    }

    private function generatedClient(array $responses, ?string $token = null, string $tokenType = 'Bot'): array
    {
        $registry              = require __DIR__.'/../src/Resources/operations-v10.php';
        $history               = new \stdClass();
        $history->transactions = [];
        $stack                 = HandlerStack::create(new MockHandler($responses));
        $stack->push(Middleware::history($history->transactions));

        return [
            new ResourceClient($registry['operations'], new Client([
                'base_uri'    => 'https://discord.com/api/v10/',
                'handler'     => $stack,
                'http_errors' => false,
            ]), $token, $tokenType),
            $history,
        ];
    }

    private function requiredOptions(array $operation): array
    {
        $options = [];
        foreach ($operation['parameters'] as $parameter) {
            if ($parameter['required']) {
                $options[$parameter['name']] = '1';
            }
        }
        if (($operation['requestBody']['required'] ?? false) === true) {
            $options['body'] = in_array('application/json', $operation['requestBody']['mediaTypes'], true)
                ? []
                : array_fill_keys($operation['requestBody']['binaryFields'], ['contents' => 'file', 'filename' => 'file']);
        }

        return $options;
    }

    private function client(array $operation, ?string $token = null, string $tokenType = 'Bot', ?ResponseInterface $response = null): array
    {
        $history               = new \stdClass();
        $history->transactions = [];
        $stack                 = HandlerStack::create(new MockHandler([$response ?? new Response(200)]));
        $stack->push(Middleware::history($history->transactions));
        $operation += ['httpMethod' => 'POST', 'path' => '/test', 'parameters' => [], 'responses' => [200 => 'json']];

        return [
            new ResourceClient(['test' => $operation], new Client(['base_uri' => 'https://discord.com/api/v10/', 'handler' => $stack, 'http_errors' => false]), $token, $tokenType),
            $history,
        ];
    }
}
