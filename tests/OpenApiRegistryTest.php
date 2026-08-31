<?php

declare(strict_types=1);

namespace RestCord\Tests;

use GuzzleHttp\Promise\PromiseInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;

final class OpenApiRegistryTest extends TestCase
{
    private array $registry;

    protected function setUp(): void
    {
        $this->registry = require __DIR__.'/../src/Resources/operations-v10.php';
    }

    public function testSourceMetadataAndCounts(): void
    {
        $this->assertSame(['_meta', 'operations'], array_keys($this->registry));
        $this->assertSame([
            'source' => [
                'repository' => 'discord/discord-api-spec',
                'path' => 'specs/openapi.json',
                'commit' => '4e5c3dbe385cc148dde582325314e598fddbd7a9',
                'checksum' => '49efa428e0dd5babf5527aa3046e2d29d0c3d9daef2c7100c2619cb440c57cf6',
            ],
            'openapiVersion' => '3.1.0',
            'apiVersion' => '10',
            'pathCount' => 150,
            'operationCount' => 242,
        ], $this->registry['_meta']);
        $this->assertCount(242, $this->registry['operations']);
    }

    public function testCategoryCounts(): void
    {
        $counts = array_count_values(array_column($this->registry['operations'], 'category'));
        ksort($counts);

        $this->assertSame([
            'applications' => 33,
            'channels' => 48,
            'gateway' => 2,
            'guilds' => 91,
            'interactions' => 1,
            'invites' => 5,
            'lobbies' => 15,
            'oauth2' => 4,
            'partnerSdk' => 5,
            'skus' => 2,
            'soundboardDefaultSounds' => 1,
            'stageInstances' => 4,
            'stickerPacks' => 2,
            'stickers' => 1,
            'users' => 12,
            'voice' => 1,
            'webhooks' => 15,
        ], $counts);
    }

    public function testOperationMetadataShapes(): void
    {
        $operations = $this->registry['operations'];

        $this->assertSame([
            'category' => 'guilds',
            'method' => 'getGuild',
            'operationId' => 'get_guild',
            'httpMethod' => 'GET',
            'path' => '/guilds/{guild_id}',
            'parameters' => [
                ['name' => 'guild_id', 'location' => 'path', 'required' => true, 'style' => 'simple', 'explode' => false],
                ['name' => 'with_counts', 'location' => 'query', 'required' => false, 'style' => 'form', 'explode' => true],
            ],
            'responses' => [200 => 'json'],
            'security' => [['BotToken' => []]],
            'interactionRoute' => false,
            'majorParameters' => ['guild_id'],
        ], $operations['get_guild']);
        $this->assertSame([
            'required' => true,
            'mediaTypes' => ['application/json'],
        ], $operations['update_guild']['requestBody']);
        $this->assertSame([
            'name' => 'audit_log_reason',
            'location' => 'header',
            'required' => false,
            'style' => 'simple',
            'explode' => false,
            'wireName' => 'X-Audit-Log-Reason',
        ], $operations['update_guild']['parameters'][1]);
        $this->assertSame([
            'required' => true,
            'mediaTypes' => ['application/json', 'application/x-www-form-urlencoded', 'multipart/form-data'],
            'binaryFields' => ['files[0]', 'files[1]', 'files[2]', 'files[3]', 'files[4]', 'files[5]', 'files[6]', 'files[7]', 'files[8]', 'files[9]'],
            'payloadJson' => true,
        ], $operations['create_message']['requestBody']);
        $this->assertSame([200 => 'stream'], $operations['get_guild_widget_png']['responses']);
        $this->assertSame([[], ['BotToken' => []]], $operations['create_interaction_response']['security']);
        $this->assertTrue($operations['create_interaction_response']['interactionRoute']);
        $this->assertSame([], $operations['create_interaction_response']['majorParameters']);
        $this->assertSame([], $operations['get_entitlements']['majorParameters']);
        $this->assertSame(['guild_id'], $operations['guild_search']['majorParameters']);

        foreach ($operations as $operationId => $operation) {
            $expectedKeys = ['category', 'method', 'operationId', 'httpMethod', 'path', 'parameters', 'responses', 'security', 'interactionRoute', 'majorParameters'];
            if (array_key_exists('requestBody', $operation)) {
                $expectedKeys[] = 'requestBody';
            }
            $actualKeys = array_keys($operation);
            sort($expectedKeys, SORT_STRING);
            sort($actualKeys, SORT_STRING);
            $this->assertSame($expectedKeys, $actualKeys, $operationId);

            $this->assertIsString($operationId);
            $this->assertSame($operationId, $operation['operationId']);
            $this->assertIsString($operation['category']);
            $this->assertSame(1, preg_match('/^[a-z][A-Za-z0-9]*$/D', $operation['category']), $operationId);
            $this->assertIsString($operation['method']);
            $this->assertSame(1, preg_match('/^[a-z][A-Za-z0-9]*$/D', $operation['method']), $operationId);
            $this->assertIsString($operation['operationId']);
            $this->assertSame(1, preg_match('/^[a-z][a-z0-9]*(?:_[a-z0-9]+)*$/D', $operation['operationId']), $operationId);
            $this->assertIsString($operation['httpMethod']);
            $this->assertContains($operation['httpMethod'], ['DELETE', 'GET', 'PATCH', 'POST', 'PUT'], $operationId);
            $this->assertIsString($operation['path']);
            $this->assertSame(1, preg_match('#^/#D', $operation['path']), $operationId);

            $this->assertIsArray($operation['parameters']);
            $parameters = [];
            $parameterNames = [];
            foreach ($operation['parameters'] as $parameter) {
                $parameterKeys = array_keys($parameter);
                sort($parameterKeys, SORT_STRING);
                $expectedParameterKeys = ['explode', 'location', 'name', 'required', 'style'];
                if (array_key_exists('wireName', $parameter)) {
                    $expectedParameterKeys[] = 'wireName';
                }
                sort($expectedParameterKeys, SORT_STRING);
                $this->assertSame($expectedParameterKeys, $parameterKeys, $operationId);
                $this->assertIsString($parameter['name']);
                $this->assertNotSame('', $parameter['name'], $operationId);
                $this->assertIsString($parameter['location']);
                $this->assertContains($parameter['location'], ['path', 'query', 'header'], $operationId);
                $this->assertIsString($parameter['style']);
                $this->assertContains($parameter['location'].'/'.$parameter['style'], ['path/simple', 'query/form', 'header/simple'], $operationId);
                $this->assertIsBool($parameter['required']);
                $this->assertIsBool($parameter['explode']);
                $wireName = $parameter['wireName'] ?? $parameter['name'];
                $this->assertIsString($wireName);
                $this->assertNotSame('', $wireName, $operationId);
                $parameterKey = $parameter['location']."\0".$wireName;
                $this->assertArrayNotHasKey($parameterKey, $parameters, $operationId);
                $parameters[$parameterKey] = $parameter;
                $parameterNames[$parameter['name']] = $parameter['location'];
            }

            $this->assertIsArray($operation['responses']);
            $this->assertNotSame([], $operation['responses'], $operationId);
            foreach ($operation['responses'] as $status => $codec) {
                $this->assertSame(1, preg_match('/^2(?:\d{2}|XX)$/iD', (string) $status), $operationId);
                $this->assertContains($codec, ['json', 'stream', 'empty'], $operationId);
            }

            $this->assertIsArray($operation['security']);
            foreach ($operation['security'] as $alternative) {
                $this->assertIsArray($alternative, $operationId);
                foreach ($alternative as $scheme => $scopes) {
                    $this->assertContains($scheme, ['BotToken', 'OAuth2'], $operationId);
                    $this->assertIsArray($scopes, $operationId);
                }
            }

            $this->assertIsBool($operation['interactionRoute']);
            $this->assertSame($operationId === 'create_interaction_response', $operation['interactionRoute'], $operationId);
            $this->assertIsArray($operation['majorParameters']);
            $this->assertSame($operation['majorParameters'], array_values(array_unique($operation['majorParameters'])), $operationId);
            foreach ($operation['majorParameters'] as $parameter) {
                $this->assertContains($parameter, ['channel_id', 'guild_id', 'webhook_id', 'webhook_token'], $operationId);
                $this->assertArrayHasKey($parameter, $parameterNames, $operationId);
                $this->assertSame('path', $parameterNames[$parameter], $operationId);
            }

            if (array_key_exists('requestBody', $operation)) {
                $body = $operation['requestBody'];
                $this->assertIsArray($body, $operationId);
                $bodyKeys = array_keys($body);
                sort($bodyKeys, SORT_STRING);
                $expectedBodyKeys = ['mediaTypes', 'required'];
                if (array_key_exists('binaryFields', $body)) {
                    $expectedBodyKeys[] = 'binaryFields';
                }
                if (array_key_exists('payloadJson', $body)) {
                    $expectedBodyKeys[] = 'payloadJson';
                }
                sort($expectedBodyKeys, SORT_STRING);
                $this->assertSame($expectedBodyKeys, $bodyKeys, $operationId);
                $this->assertIsBool($body['required']);
                $this->assertIsArray($body['mediaTypes']);
                $this->assertNotSame([], $body['mediaTypes'], $operationId);
                foreach ($body['mediaTypes'] as $mediaType) {
                    $this->assertIsString($mediaType, $operationId);
                    $this->assertNotSame('', $mediaType, $operationId);
                }
                if (array_key_exists('binaryFields', $body)) {
                    $this->assertIsArray($body['binaryFields'], $operationId);
                    foreach ($body['binaryFields'] as $field) {
                        $this->assertIsString($field, $operationId);
                        $this->assertNotSame('', $field, $operationId);
                    }
                }
                if (array_key_exists('payloadJson', $body)) {
                    $this->assertIsBool($body['payloadJson'], $operationId);
                    if ($body['payloadJson']) {
                        $this->assertContains('multipart/form-data', $body['mediaTypes'], $operationId);
                    }
                }
            }
        }
    }

    public function testRegistryAndGeneratedClientsAreAnExactBijection(): void
    {
        $expected = [];
        foreach ($this->registry['operations'] as $operation) {
            $class = 'RestCord\\Generated\\'.ucfirst($operation['category']).'Api';
            $expected[$class][$operation['method']] = $operation['operationId'];
        }
        ksort($expected);

        $files = glob(__DIR__.'/../src/Generated/*Api.php') ?: [];
        $actualFiles = array_map('basename', $files);
        sort($actualFiles, SORT_STRING);
        $expectedFiles = array_map(static fn (string $class): string => substr(strrchr($class, '\\'), 1).'.php', array_keys($expected));
        sort($expectedFiles, SORT_STRING);
        $this->assertSame($expectedFiles, $actualFiles);

        $syncMethods = 0;
        $asyncMethods = 0;
        foreach ($expected as $class => $operations) {
            ksort($operations);
            $reflection = new ReflectionClass($class);
            $this->assertTrue($reflection->isFinal(), $class);
            $actualMethods = [];
            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                if ($method->getDeclaringClass()->getName() === $class && $method->getName() !== '__construct') {
                    $actualMethods[$method->getName()] = $method;
                }
            }

            $expectedMethods = [];
            foreach ($operations as $method => $_) {
                $expectedMethods[] = $method;
                $expectedMethods[] = $method.'Async';
            }
            sort($expectedMethods, SORT_STRING);
            $actualMethodNames = array_keys($actualMethods);
            sort($actualMethodNames, SORT_STRING);
            $this->assertSame($expectedMethods, $actualMethodNames, $class);

            $source = file_get_contents(__DIR__.'/../src/Generated/'.substr(strrchr($class, '\\'), 1).'.php');
            foreach ($operations as $method => $operationId) {
                $syncReturnType = $actualMethods[$method]->getReturnType();
                $this->assertNotNull($syncReturnType, "{$class}::{$method}");
                $this->assertSame('mixed', $syncReturnType->getName(), "{$class}::{$method}");
                $asyncReturnType = $actualMethods[$method.'Async']->getReturnType();
                $this->assertNotNull($asyncReturnType, "{$class}::{$method}Async");
                $this->assertSame(PromiseInterface::class, $asyncReturnType->getName(), "{$class}::{$method}Async");
                $this->assertStringContainsString("return \$this->{$method}Async(\$options)->wait();", $source, "{$class}::{$method}");
                $this->assertStringContainsString("requestAsync('{$operationId}', \$options)", $source, "{$class}::{$method}Async");
                ++$syncMethods;
                ++$asyncMethods;
            }
        }

        $this->assertSame(242, $syncMethods);
        $this->assertSame(242, $asyncMethods);
    }
}
