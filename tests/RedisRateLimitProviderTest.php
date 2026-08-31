<?php

declare(strict_types=1);

namespace RestCord\Tests;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\PumpStream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use RestCord\RateLimit\Provider\RedisRateLimitProvider;
use RestCord\RateLimit\RateLimitReservation;
use RestCord\RateLimit\RateLimitStorageException;

final class RedisRateLimitProviderTest extends TestCase
{
    private string $host;

    private string $prefix;

    private \Redis $redis;

    private RedisRateLimitProvider $provider;

    protected function setUp(): void
    {
        if (!class_exists(\Redis::class)) {
            self::markTestSkipped('ext-redis is not installed.');
        }

        $host = getenv('RESTCORD_REDIS_HOST');
        if (!is_string($host) || $host === '') {
            self::markTestSkipped('RESTCORD_REDIS_HOST is not set.');
        }

        $this->host = $host;
        $this->prefix = 'restcord.test.'.bin2hex(random_bytes(8)).'.';
        $this->redis = new \Redis();
        try {
            $this->redis->connect($this->host, 6379, 1.0);
        } catch (\RedisException $exception) {
            self::markTestSkipped('Redis is unavailable: '.$exception->getMessage());
        }
        $this->provider = new RedisRateLimitProvider([
            'client' => $this->redis,
            'prefix' => $this->prefix,
        ]);
    }

    protected function tearDown(): void
    {
        if (!isset($this->redis) || !$this->redis->isConnected()) {
            return;
        }

        $keys = $this->keys();
        if ($keys !== []) {
            $this->redis->del(...$keys);
        }
        $this->redis->close();
    }

    public function testRealAliasMigrationKeepsTheLowestRemainingAndLatestReset(): void
    {
        $startedAt = microtime(true);
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('shared-bucket', 2, 5.0));
        $this->provider->updateFromResponse('POST', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', $this->limitedResponse('', 0, 10.0));
        $this->provider->updateFromResponse('POST', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'shared-bucket',
        ]));

        self::assertGreaterThanOrEqual($startedAt + 9.5, $this->reserve());
    }

    public function testTwoBarrierSynchronizedProcessesHaveOneRouteWinner(): void
    {
        $startedAt = microtime(true);
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('contended-bucket', 1, 2.0));
        $sendTimes = $this->concurrentReservations('/channels/{channel_id}', 'channel:1');

        self::assertLessThan($startedAt + 1.5, $sendTimes[0]);
        self::assertGreaterThanOrEqual($startedAt + 1.9, $sendTimes[1]);
    }

    public function testConcurrentPreAliasReservationsReduceLearnedCapacity(): void
    {
        $startedAt = microtime(true);
        $sendTimes = $this->concurrentReservations('/channels/{channel_id}/messages', 'channel:1');
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', $this->limitedResponse('learned-after-contention', 1, 3.0));

        self::assertLessThan($startedAt + 0.5, $sendTimes[1]);
        self::assertGreaterThanOrEqual($startedAt + 2.5, $this->reserve(route: '/channels/{channel_id}/messages'));
    }

    public function testRollingGlobalCeilingUsesAbsoluteFractionalRedisTime(): void
    {
        $first = $this->reserve(globalLimit: 2);
        $second = $this->reserve(globalLimit: 2);
        $third = $this->reserve(globalLimit: 2);

        self::assertGreaterThan(1_000_000_000.0, $first);
        self::assertEqualsWithDelta($first, $second, 0.05);
        self::assertGreaterThanOrEqual($first + 0.999, $third);
    }

    public function testFractionalRouteWindowsAdvanceAtCurrentEpoch(): void
    {
        foreach ([0.1, 0.3] as $index => $window) {
            $route = '/fractional/'.$index;
            $major = 'fractional:'.$index;
            $this->provider->updateFromResponse('GET', $route, $major, true, 'scope', new Response(200, [
                'X-RateLimit-Bucket' => 'fractional-bucket-'.$index,
                'X-RateLimit-Limit' => '1',
                'X-RateLimit-Remaining' => '0',
                'X-RateLimit-Reset-After' => (string) $window,
            ]));

            $reservations = [];
            foreach (range(1, 4) as $_) {
                $reservations[] = $this->reserve($route, $major, true);
            }

            foreach (array_slice($reservations, 1) as $offset => $reservation) {
                self::assertGreaterThanOrEqual($reservations[$offset] + $window - 0.005, $reservation);
            }
        }
    }

    public function testKnownAliasReceivesBucketlessShared429(): void
    {
        $route = '/channels/{channel_id}/known-alias';
        $startedAt = microtime(true);
        $this->provider->updateFromResponse('GET', $route, 'channel:1', true, 'scope', $this->limitedResponse('known-alias-bucket', 1, 0.25));
        $this->provider->updateFromResponse('GET', $route, 'channel:1', true, 'scope', new Response(429, [
            'X-RateLimit-Scope' => 'shared',
        ], '{"retry_after":2.0}'));

        self::assertGreaterThanOrEqual($startedAt + 1.9, $this->reserve($route, interaction: true));
        self::assertSame([], array_values(array_filter(
            $this->keys(),
            static fn (string $key): bool => str_contains($key, 'state:route:')
        )));
    }

    public function testRejectedReservationsDoNotChangeRedisState(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('reject-bucket', 0, 2.0));
        $before = $this->dumpedState();

        foreach (range(1, 3) as $_) {
            $reservation = $this->reservation(rejectDelayed: true);
            self::assertFalse($reservation->reserved);
            self::assertGreaterThan(microtime(true) + 1.5, $reservation->sendAt);
        }

        self::assertSame($before, $this->dumpedState());
    }

    public function testMinimumDelayIsAppliedInsideTheReservation(): void
    {
        $startedAt = microtime(true);
        $reservation = $this->reservation(interaction: true, minimumDelay: 0.25);

        self::assertTrue($reservation->reserved);
        self::assertGreaterThanOrEqual($startedAt + 0.24, $reservation->sendAt);
    }

    public function testMixedRoutesAccountForFutureGlobalSlots(): void
    {
        $first = $this->reserve(route: '/future/a', majorScope: '', globalLimit: 2, minimumDelay: 0.4);
        $second = $this->reserve(route: '/future/b', majorScope: '', globalLimit: 2, minimumDelay: 0.5);
        $third = $this->reserve(route: '/future/c', majorScope: '', globalLimit: 2);

        self::assertGreaterThanOrEqual(min($first, $second) + 0.99, $third);
        $this->assertGlobalRollingCeiling('scope', 2);
    }

    public function testBarrierSynchronizedProcessesShareTheGlobalCeiling(): void
    {
        $startedAt = microtime(true);
        $sendTimes = $this->concurrentReservations('/global', '', 1, true);

        self::assertLessThan($startedAt + 0.5, $sendTimes[0]);
        self::assertGreaterThanOrEqual($sendTimes[0] + 0.99, $sendTimes[1]);
        $this->assertGlobalRollingCeiling('scope', 1);
    }

    public function testInteractionExemptionAndGlobalScopesAreIndependent(): void
    {
        $first = $this->reserve(globalScope: 'scope-a', globalLimit: 1);
        $interaction = $this->reserve(route: '/interactions/{id}/{token}/callback', interaction: true, globalScope: 'scope-a', globalLimit: 1);
        $otherScope = $this->reserve(globalScope: 'scope-b', globalLimit: 1);

        self::assertLessThan($first + 0.1, $interaction);
        self::assertLessThan($first + 0.1, $otherScope);
    }

    public function testMajorScopesHaveIndependentRouteState(): void
    {
        $startedAt = microtime(true);
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('channel-bucket', 0, 3.0));

        self::assertGreaterThanOrEqual($startedAt + 2.5, $this->reserve(majorScope: 'channel:1'));
        self::assertLessThan($startedAt + 0.5, $this->reserve(majorScope: 'channel:2'));
    }

    public function testEveryProviderKeyHasABoundedTtlAndExpiredStateDoesNotBlock(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('expiring-bucket', 0, 30.0));
        $this->reserve(globalLimit: 2);
        $keys = $this->keys();

        self::assertNotSame([], $keys);
        foreach ($keys as $key) {
            $ttl = $this->redis->ttl($key);
            self::assertGreaterThan(0, $ttl, $key);
            self::assertLessThanOrEqual(RedisRateLimitProvider::MAX_TTL, $ttl, $key);
            $this->redis->pexpire($key, 0);
        }

        self::assertLessThan(microtime(true) + 0.5, $this->reserve());
    }

    public function testKeysNeverContainRoutesBucketsTokensOrOpaqueScopes(): void
    {
        $route = '/webhooks/{webhook_id}/secret-webhook-token';
        $bucket = 'secret-bucket-id';
        $major = 'webhook:42:secret-webhook-token';
        $scope = 'Bot secret-auth-token';
        $this->provider->updateFromResponse('POST', $route, $major, false, $scope, $this->limitedResponse($bucket, 1, 1.0));
        $this->provider->reserve('POST', $route, $major, false, $scope, 50);
        $keys = implode("\n", $this->keys());

        foreach ([$route, $bucket, 'secret-webhook-token', 'secret-auth-token', $major, $scope] as $secret) {
            self::assertStringNotContainsString($secret, $keys);
        }
    }

    public function testDisconnectedReservationFailsClosed(): void
    {
        $provider = new RedisRateLimitProvider([
            'client' => new \Redis(),
            'prefix' => $this->prefix,
        ]);

        $this->expectException(RateLimitStorageException::class);
        $provider->reserve('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', 50);
    }

    public function testFailedResponseUpdateBlocksReservationsUntilTheKnownWindowEnds(): void
    {
        $redisProperty = new \ReflectionProperty($this->provider, 'redis');
        $redisProperty->setValue($this->provider, new \Redis());
        try {
            $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse('failed-update', 0, 5.0));
            self::fail('The failed update did not throw.');
        } catch (RateLimitStorageException) {
        }

        $redisProperty->setValue($this->provider, $this->redis);
        try {
            $this->reserve();
            self::fail('The unhealthy provider allowed an early reservation.');
        } catch (RateLimitStorageException) {
        }

        $property = new \ReflectionProperty($this->provider, 'unhealthyUntil');
        $property->setValue($this->provider, microtime(true) - 1.0);

        self::assertLessThan(microtime(true) + 0.5, $this->reserve());
    }

    public function testStructuredRetryAfterHonorsGlobalUserAndSharedScopes(): void
    {
        $startedAt = microtime(true);
        $this->provider->updateFromResponse('GET', '/gateway', '', false, 'scope-global', new Response(429, [
            'X-RateLimit-Scope' => 'global',
        ], '{"retry_after":3.0,"global":true}'));
        $this->provider->updateFromResponse('GET', '/users/@me', '', false, 'scope-user', new Response(429, [
            'X-RateLimit-Scope' => 'user',
            'X-RateLimit-Bucket' => 'user-bucket',
        ], '{"retry_after":4.0}'));
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope-shared', new Response(429, [
            'X-RateLimit-Scope' => 'shared',
            'X-RateLimit-Bucket' => 'shared-bucket',
        ], '{"retry_after":5.0}'));

        self::assertGreaterThanOrEqual($startedAt + 2.5, $this->reserve(route: '/gateway', globalScope: 'scope-global'));
        self::assertGreaterThanOrEqual($startedAt + 3.5, $this->reserve(route: '/users/@me', majorScope: '', globalScope: 'scope-user'));
        self::assertGreaterThanOrEqual($startedAt + 4.5, $this->reserve(globalScope: 'scope-shared'));
    }

    public function testSuccessfulNonseekableResponseBodyIsNotConsumed(): void
    {
        $chunks = ['binary-body', false];
        $body = new PumpStream(static function () use (&$chunks): string|false {
            return array_shift($chunks);
        });
        $response = new Response(200, [
            'X-RateLimit-Bucket' => 'stream-bucket',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '1',
            'X-RateLimit-Reset-After' => '1',
        ], $body);

        $this->provider->updateFromResponse('GET', '/stream', '', false, 'scope', $response);

        self::assertSame('binary-body', $body->getContents());
    }

    public function testShared429PreservesSeekableBodyPosition(): void
    {
        $json = '{"retry_after":0.25}';
        $body = Utils::streamFor($json);
        $body->read(3);
        $response = new Response(429, [
            'X-RateLimit-Scope' => 'shared',
            'X-RateLimit-Bucket' => 'cursor-bucket',
        ], $body);

        $this->provider->updateFromResponse('GET', '/cursor', '', true, 'scope', $response);

        self::assertSame(3, $body->tell());
        self::assertSame(substr($json, 3), $body->getContents());
    }

    private function reserve(
        string $route = '/channels/{channel_id}',
        string $majorScope = 'channel:1',
        bool $interaction = false,
        string $globalScope = 'scope',
        int $globalLimit = 50,
        float $minimumDelay = 0.0,
        bool $rejectDelayed = false
    ): float {
        return $this->reservation($route, $majorScope, $interaction, $globalScope, $globalLimit, $minimumDelay, $rejectDelayed)->sendAt;
    }

    private function reservation(
        string $route = '/channels/{channel_id}',
        string $majorScope = 'channel:1',
        bool $interaction = false,
        string $globalScope = 'scope',
        int $globalLimit = 50,
        float $minimumDelay = 0.0,
        bool $rejectDelayed = false
    ): RateLimitReservation {
        return $this->provider->reserve(
            'GET',
            $route,
            $majorScope,
            $interaction,
            $globalScope,
            $globalLimit,
            $minimumDelay,
            $rejectDelayed
        );
    }

    private function limitedResponse(string $bucket, int $remaining, float $resetAfter): Response
    {
        $headers = [
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => (string) $remaining,
            'X-RateLimit-Reset-After' => (string) $resetAfter,
        ];
        if ($bucket !== '') {
            $headers['X-RateLimit-Bucket'] = $bucket;
        }

        return new Response(200, $headers);
    }

    private function concurrentReservations(
        string $route,
        string $majorScope,
        int $globalLimit = 50,
        bool $distinctRoutes = false
    ): array
    {
        $barrier = bin2hex(random_bytes(4));
        $readyKey = $this->prefix.'barrier.'.$barrier.'.ready';
        $goKey = $this->prefix.'barrier.'.$barrier.'.go';
        $code = <<<'PHP'
require 'vendor/autoload.php';
$redis = new Redis();
$redis->connect($argv[1], 6379, 1.0);
$provider = new RestCord\RateLimit\Provider\RedisRateLimitProvider(['client' => $redis, 'prefix' => $argv[2]]);
$redis->incr($argv[5]);
$deadline = microtime(true) + 5.0;
while (!$redis->exists($argv[6]) && microtime(true) < $deadline) {
    usleep(1000);
}
if (!$redis->exists($argv[6])) {
    fwrite(STDERR, 'barrier timeout');
    exit(2);
}
fwrite(STDOUT, (string) $provider->reserve('GET', $argv[3], $argv[4], false, 'scope', (int) $argv[7])->sendAt);
PHP;
        $processes = [];
        foreach (range(1, 2) as $index) {
            $pipes = [];
            $process = proc_open([PHP_BINARY, '-r', $code, '--', $this->host, $this->prefix, $distinctRoutes ? $route.'/'.$index : $route, $majorScope, $readyKey, $goKey, (string) $globalLimit], [
                ['pipe', 'r'],
                ['pipe', 'w'],
                ['pipe', 'w'],
            ], $pipes, dirname(__DIR__));
            self::assertIsResource($process);
            fclose($pipes[0]);
            $processes[] = [$process, $pipes];
        }

        $deadline = microtime(true) + 5.0;
        while ((int) $this->redis->get($readyKey) < 2 && microtime(true) < $deadline) {
            usleep(1000);
        }
        self::assertSame(2, (int) $this->redis->get($readyKey));
        $this->redis->set($goKey, '1');

        $sendTimes = [];
        foreach ($processes as [$process, $pipes]) {
            $output = stream_get_contents($pipes[1]);
            $error = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            self::assertSame(0, proc_close($process), $error);
            self::assertIsString($output);
            $sendTimes[] = (float) $output;
        }
        sort($sendTimes, SORT_NUMERIC);

        return $sendTimes;
    }

    private function dumpedState(): array
    {
        $state = [];
        foreach ($this->keys() as $key) {
            $state[$key] = $this->redis->dump($key);
        }

        return $state;
    }

    private function assertGlobalRollingCeiling(string $scope, int $limit): void
    {
        $reservations = array_values($this->redis->zRange(
            $this->prefix.'global:'.hash('sha256', $scope).':schedule',
            0,
            -1,
            true
        ));
        sort($reservations, SORT_NUMERIC);
        foreach ($reservations as $end) {
            self::assertLessThanOrEqual($limit, count(array_filter(
                $reservations,
                static fn (float $reservation): bool => $reservation > $end - 1000000 && $reservation <= $end
            )));
        }
    }

    private function keys(): array
    {
        $iterator = null;
        $keys = [];
        do {
            $batch = $this->redis->scan($iterator, $this->prefix.'*', 100);
            if (is_array($batch)) {
                array_push($keys, ...$batch);
            }
        } while ($iterator !== 0);

        sort($keys);

        return $keys;
    }
}
