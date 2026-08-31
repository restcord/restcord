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

use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use RestCord\RateLimit\Provider\RateLimitProviderInterface;
use RestCord\RateLimit\RateLimiter;
use RestCord\RateLimit\RatelimitException;
use RestCord\RateLimit\RateLimitReservation;
use RestCord\RateLimit\RateLimitStorageException;

final class RateLimiterTest extends TestCase
{
    public function testPredictedWaitBecomesGuzzleDelayMilliseconds(): void
    {
        $provider = new RecordingRateLimitProvider([10.125]);
        $calls    = [];
        $handler  = static function ($request, array $options) use (&$calls): PromiseInterface {
            $calls[] = [$request, $options];

            return Create::promiseFor(new Response());
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 10.0);

        $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();

        self::assertSame(125.0, $calls[0][1]['delay']);
        self::assertCount(1, $provider->reservations);
    }

    public function testProviderWorkCountsTowardTheRemainingDelay(): void
    {
        $provider = new RecordingRateLimitProvider([11.0]);
        $times    = [10.0, 10.25];
        $delay    = null;
        $handler  = static function ($request, array $options) use (&$delay): PromiseInterface {
            $delay = $options['delay'];

            return Create::promiseFor(new Response());
        };
        $middleware = new RateLimiter($provider, clock: static function () use (&$times): float {
            return array_shift($times);
        });

        $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();

        self::assertSame(750.0, $delay);
    }

    public function testPredictedWaitRejectsWithoutSendingWhenConfigured(): void
    {
        $provider = new RecordingRateLimitProvider([new RateLimitReservation(10.25, false)]);
        $calls    = 0;
        $handler  = static function () use (&$calls): PromiseInterface {
            $calls++;

            return Create::promiseFor(new Response());
        };
        $middleware = new RateLimiter($provider, true, clock: static fn (): float => 10.0);

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
            self::fail('Expected the predicted wait to reject.');
        } catch (RatelimitException $exception) {
            self::assertSame('get_gateway', $exception->getOperationId());
            self::assertSame(0.25, $exception->getRetryAfter());
            self::assertNull($exception->getResponse());
        }

        self::assertSame(0, $calls);
        self::assertTrue($provider->reservations[0][7]);
    }

    public function testPostResponseStorageFailurePreservesResponseAndSanitizesLog(): void
    {
        $provider   = new RecordingRateLimitProvider([0.0], new RateLimitStorageException('storage-secret'));
        $logger     = new RecordingLogger();
        $response   = new Response(201, [], '{"token":"response-secret"}');
        $handler    = static fn (): PromiseInterface => Create::promiseFor($response);
        $middleware = new RateLimiter($provider, logger: $logger, clock: static fn (): float => 0.0);

        $result = $middleware($handler)(new Request('POST', 'https://discord.com/api/v10/webhooks/url-secret'), $this->metadata([
            'operationId' => 'execute_webhook',
            'route'       => '/webhooks/{webhook_id}/{webhook_token}',
        ]))->wait();

        self::assertSame($response, $result);
        self::assertSame([['warning', 'Rate-limit response update failed.', [
            'operationId' => 'execute_webhook',
            'status'      => 201,
        ]]], $logger->records);
        $logs = json_encode($logger->records, JSON_THROW_ON_ERROR);
        self::assertStringNotContainsString('storage-secret', $logs);
        self::assertStringNotContainsString('response-secret', $logs);
        self::assertStringNotContainsString('url-secret', $logs);
    }

    public function test429RetriesReserveEveryAttemptAndUseTheLargerDelay(): void
    {
        $provider  = new RecordingRateLimitProvider([0.0, 0.4, 0.5]);
        $responses = [
            new Response(429, ['X-RateLimit-Scope' => 'user'], '{"retry_after":0.25}'),
            new Response(429, ['X-RateLimit-Scope' => 'shared', 'Retry-After' => '0.5'], '{}'),
            new Response(200),
        ];
        $delays  = [];
        $handler = static function ($request, array $options) use (&$responses, &$delays): PromiseInterface {
            $delays[] = $options['delay'];

            return Create::promiseFor(array_shift($responses));
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

        $response = $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();

        self::assertSame(200, $response->getStatusCode());
        self::assertSame([0.0, 400.0, 500.0], $delays);
        self::assertCount(3, $provider->reservations);
        self::assertCount(3, $provider->updates);
        self::assertSame([0.0, 0.25, 0.5], array_column($provider->reservations, 6));
        self::assertSame('user', $provider->updates[0][5]->getHeaderLine('X-RateLimit-Scope'));
        self::assertSame('shared', $provider->updates[1][5]->getHeaderLine('X-RateLimit-Scope'));
    }

    public function test429RetryExhaustionRejectsAfterThreeRetries(): void
    {
        $provider = new RecordingRateLimitProvider([0.0, 0.125, 0.125, 0.125]);
        $response = new Response(429, ['X-RateLimit-Scope' => 'global'], '{"retry_after":0.125}');
        $calls    = 0;
        $handler  = static function () use (&$calls, $response): PromiseInterface {
            $calls++;

            return Create::promiseFor($response);
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
            self::fail('Expected exhausted retries to reject.');
        } catch (RatelimitException $exception) {
            self::assertSame('get_gateway', $exception->getOperationId());
            self::assertSame(0.125, $exception->getRetryAfter());
            self::assertSame($response, $exception->getResponse());
        }

        self::assertSame(4, $calls);
        self::assertCount(4, $provider->reservations);
        self::assertCount(4, $provider->updates);
        self::assertSame('global', $provider->updates[3][5]->getHeaderLine('X-RateLimit-Scope'));
    }

    public function testReceived429RejectsWithoutRetryWhenConfigured(): void
    {
        $provider = new RecordingRateLimitProvider([0.0]);
        $response = new Response(429, [], '{"retry_after":0.375}');
        $calls    = 0;
        $handler  = static function () use (&$calls, $response): PromiseInterface {
            $calls++;

            return Create::promiseFor($response);
        };
        $middleware = new RateLimiter($provider, true, clock: static fn (): float => 0.0);

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
            self::fail('Expected the 429 to reject.');
        } catch (RatelimitException $exception) {
            self::assertSame(0.375, $exception->getRetryAfter());
            self::assertSame($response, $exception->getResponse());
        }

        self::assertSame(1, $calls);
        self::assertCount(1, $provider->reservations);
        self::assertCount(1, $provider->updates);
    }

    public function testMalformedRetryAfterRejectsWithoutRetrying(): void
    {
        foreach ([
            new Response(429, [], '{'),
            new Response(429, ['Retry-After' => 'later'], '{}'),
        ] as $response) {
            $provider = new RecordingRateLimitProvider([0.0]);
            $calls    = 0;
            $handler  = static function () use (&$calls, $response): PromiseInterface {
                $calls++;

                return Create::promiseFor($response);
            };
            $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

            try {
                $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
                self::fail('Expected malformed retry_after to reject.');
            } catch (RatelimitException $exception) {
                self::assertSame(0.0, $exception->getRetryAfter());
                self::assertSame($response, $exception->getResponse());
            }

            self::assertSame(1, $calls);
        }
    }

    public function testNonseekable429BodyRemainsAvailableAfterParsing(): void
    {
        $json       = '{"retry_after":0.25,"message":"limited"}';
        $response   = new Response(429, [], new NoSeekStream(\GuzzleHttp\Psr7\Utils::streamFor($json)));
        $provider   = new RecordingRateLimitProvider([0.0]);
        $handler    = static fn (): PromiseInterface => Create::promiseFor($response);
        $middleware = new RateLimiter($provider, true, clock: static fn (): float => 0.0);

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
            self::fail('Expected the 429 to reject.');
        } catch (RatelimitException $exception) {
            self::assertSame($json, (string) $exception->getResponse()?->getBody());
            self::assertSame($json, (string) $provider->updates[0][5]->getBody());
        }
    }

    public function testAsyncPredictedWaitSchedulesWithoutWaiting(): void
    {
        $provider = new RecordingRateLimitProvider([5.5]);
        $pending  = new Promise();
        $calls    = 0;
        $delay    = null;
        $handler  = static function ($request, array $options) use (&$calls, &$delay, $pending): PromiseInterface {
            $calls++;
            $delay = $options['delay'];

            return $pending;
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 5.0);

        $promise = $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata());

        self::assertSame(1, $calls);
        self::assertSame(500.0, $delay);
        self::assertSame(PromiseInterface::PENDING, $promise->getState());
        $pending->resolve(new Response());
        self::assertSame(200, $promise->wait()->getStatusCode());
    }

    public function testWaitingOnMiddlewarePromiseDrivesTheHandlerPromise(): void
    {
        $provider = new RecordingRateLimitProvider([0.0]);
        $pending  = null;
        $waited   = false;
        $handler  = static function () use (&$pending, &$waited): PromiseInterface {
            $pending = new Promise(static function () use (&$pending, &$waited): void {
                $waited = true;
                $pending->resolve(new Response(204));
            });

            return $pending;
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

        $promise = $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata());
        self::assertFalse($waited);

        self::assertSame(204, $promise->wait()->getStatusCode());
        self::assertTrue($waited);
    }

    public function testExistingGuzzleDelayCannotBeShortened(): void
    {
        $provider = new RecordingRateLimitProvider([1.25]);
        $delay    = null;
        $handler  = static function ($request, array $options) use (&$delay): PromiseInterface {
            $delay = $options['delay'];

            return Create::promiseFor(new Response());
        };
        $middleware       = new RateLimiter($provider, clock: static fn (): float => 1.0);
        $options          = $this->metadata();
        $options['delay'] = 250;

        $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $options)->wait();

        self::assertSame(250.0, $delay);
        self::assertSame(0.25, $provider->reservations[0][6]);
    }

    public function testProviderCannotReserveBeforeTheMinimumDelay(): void
    {
        $provider = new RecordingRateLimitProvider([0.0]);
        $calls    = 0;
        $handler  = static function () use (&$calls): PromiseInterface {
            $calls++;

            return Create::promiseFor(new Response());
        };
        $middleware       = new RateLimiter($provider, clock: static fn (): float => 0.0);
        $options          = $this->metadata();
        $options['delay'] = 250;

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $options)->wait();
            self::fail('Expected the invalid reservation to reject.');
        } catch (\UnexpectedValueException) {
        }

        self::assertSame(0, $calls);
    }

    public function testPreSendStorageFailureRejectsWithoutCallingHandler(): void
    {
        $provider = new RecordingRateLimitProvider([new RateLimitStorageException('unavailable')]);
        $calls    = 0;
        $handler  = static function () use (&$calls): PromiseInterface {
            $calls++;

            return Create::promiseFor(new Response());
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

        try {
            $middleware($handler)(new Request('GET', 'https://discord.com/api/v10/gateway'), $this->metadata())->wait();
            self::fail('Expected reservation failure to reject.');
        } catch (RateLimitStorageException $exception) {
            self::assertSame('unavailable', $exception->getMessage());
        }

        self::assertSame(0, $calls);
    }

    public function test429UpdateFailureReturnsResponseWithoutRetrying(): void
    {
        $provider = new RecordingRateLimitProvider(
            [0.0],
            new RateLimitStorageException('unavailable')
        );
        $response = new Response(429, [], '{"retry_after":0.25}');
        $calls    = 0;
        $handler  = static function () use (&$calls, $response): PromiseInterface {
            $calls++;

            return Create::promiseFor($response);
        };
        $middleware = new RateLimiter($provider, clock: static fn (): float => 0.0);

        $result = $middleware($handler)(new Request('POST', 'https://discord.com/api/v10/webhooks/1/token'), $this->metadata())->wait();

        self::assertSame($response, $result);
        self::assertSame(1, $calls);
        self::assertCount(1, $provider->reservations);
        self::assertCount(1, $provider->updates);
    }

    private function metadata(array $overrides = []): array
    {
        return [RateLimiter::OPTION => $overrides + [
            'operationId'      => 'get_gateway',
            'method'           => 'GET',
            'route'            => '/gateway',
            'majorScope'       => '',
            'interactionRoute' => false,
            'globalScope'      => 'anonymous',
        ]];
    }
}

final class RecordingRateLimitProvider implements RateLimitProviderInterface
{
    public array $reservations = [];

    public array $updates = [];

    public function __construct(private array $sendAt = [], private ?\Throwable $updateException = null)
    {
    }

    public function reserve(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        int $globalLimit,
        float $minimumDelay = 0.0,
        bool $rejectDelayed = false
    ): RateLimitReservation {
        $this->reservations[] = func_get_args();

        $sendAt = array_shift($this->sendAt) ?? 0.0;
        if ($sendAt instanceof \Throwable) {
            throw $sendAt;
        }

        return $sendAt instanceof RateLimitReservation
            ? $sendAt
            : new RateLimitReservation((float) $sendAt, true);
    }

    public function updateFromResponse(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        ResponseInterface $response
    ): void {
        $this->updates[] = func_get_args();
        if ($this->updateException !== null) {
            throw $this->updateException;
        }
    }
}

final class RecordingLogger extends \Psr\Log\AbstractLogger
{
    public array $records = [];

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $this->records[] = [$level, (string) $message, $context];
    }
}
