<?php

declare(strict_types=1);

namespace RestCord\Tests;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use RestCord\RateLimit\Provider\MemoryRateLimitProvider;
use RestCord\RateLimit\RateLimitReservation;

final class MemoryRateLimitProviderTest extends TestCase
{
    private float $now;

    private MemoryRateLimitProvider $provider;

    protected function setUp(): void
    {
        $this->now = 0.0;
        $this->provider = new MemoryRateLimitProvider(fn (): float => $this->now);
    }

    public function testFiftyFirstDefaultReservationWaitsOneSecond(): void
    {
        for ($request = 0; $request < 50; ++$request) {
            self::assertSame(0.0, $this->reserve());
        }

        self::assertSame(1.0, $this->reserve());
    }

    public function testGlobalScheduleRefillsAfterOneSecond(): void
    {
        for ($request = 0; $request < 50; ++$request) {
            $this->reserve();
        }

        $this->now = 1.0;

        self::assertSame(1.0, $this->reserve());
    }

    public function testCustomGlobalCeilingIsReserved(): void
    {
        self::assertSame(0.0, $this->reserve(globalLimit: 2));
        self::assertSame(0.0, $this->reserve(globalLimit: 2));
        self::assertSame(1.0, $this->reserve(globalLimit: 2));
    }

    public function testInteractionRouteSkipsGlobalReservation(): void
    {
        for ($request = 0; $request < 50; ++$request) {
            $this->reserve();
        }

        self::assertSame(0.0, $this->reserve(interaction: true));
    }

    public function testAuthScopesHaveIndependentGlobalSchedules(): void
    {
        for ($request = 0; $request < 50; ++$request) {
            $this->reserve(globalScope: 'scope-a');
        }

        self::assertSame(0.0, $this->reserve(globalScope: 'scope-b'));
    }

    public function testGlobalResponseLimitIsScopedAndSkipsInteractions(): void
    {
        $response = new Response(429, ['X-RateLimit-Scope' => 'global'], '{"retry_after":0.5,"global":true}');
        $this->provider->updateFromResponse('GET', '/gateway', '', false, 'scope-a', $response);
        $this->provider->updateFromResponse('POST', '/interactions/{interaction_id}/{interaction_token}/callback', '', true, 'scope-b', $response);

        self::assertSame(0.5, $this->reserve(globalScope: 'scope-a'));
        self::assertSame(0.0, $this->reserve(globalScope: 'scope-b'));
    }

    public function testMajorParametersSeparateLearnedBuckets(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse(1.0));

        self::assertSame(1.0, $this->reserve(majorScope: 'channel:1'));
        self::assertSame(0.0, $this->reserve(majorScope: 'channel:2'));
    }

    public function testSharedBucketAliasReconcilesConservatively(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'shared',
            'X-RateLimit-Limit' => '5',
            'X-RateLimit-Remaining' => '2',
            'X-RateLimit-Reset-After' => '1',
        ]));
        $this->provider->updateFromResponse('POST', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Limit' => '5',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '2',
        ]));
        $this->provider->updateFromResponse('POST', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'shared',
        ]));

        self::assertSame(2.0, $this->reserve());
    }

    public function testResetAfterSupportsFractionsAndWinsOverReset(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '1',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '0.25',
            'X-RateLimit-Reset' => '10',
        ]));

        self::assertSame(0.25, $this->reserve());
    }

    public function testMalformedResponseHeadersDoNotCreateAWait(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '-1',
            'X-RateLimit-Remaining' => 'unknown',
            'X-RateLimit-Reset-After' => 'NaN',
            'X-RateLimit-Reset' => 'later',
        ]));

        self::assertSame(0.0, $this->reserve());
    }

    public function testLearnedBucketExpiresAtReset(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse(0.25));
        $this->now = 0.25;

        self::assertSame(0.25, $this->reserve());
    }

    public function testKnownAliasUpdateDoesNotDuplicateFutureReservations(): void
    {
        $response = new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '1',
        ]);
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $response);
        self::assertSame(1.0, $this->reserve());

        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
        ]));

        self::assertSame(1.0, $this->reserve());
    }

    public function testLearnedLimitStillCoordinatesReservationsAfterReset(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '1',
        ]));
        $this->now = 1.0;

        self::assertSame(1.0, $this->reserve());
        self::assertSame(1.0, $this->reserve());
        self::assertSame(2.0, $this->reserve());
    }

    public function testResponseAfterResetCanReplenishRemainingCapacity(): void
    {
        $response = new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '1',
        ]);
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $response);
        $this->now = 1.0;
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '1',
            'X-RateLimit-Reset-After' => '1',
        ]));

        self::assertSame(1.0, $this->reserve());
        self::assertSame(2.0, $this->reserve());
    }

    public function testFractionalWindowsAdvanceAtCurrentEpoch(): void
    {
        foreach ([0.1, 0.3] as $window) {
            $this->now = 1_800_000_000.0;
            $this->provider = new MemoryRateLimitProvider(fn (): float => $this->now);
            $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', $this->limitedResponse($window));

            self::assertEqualsWithDelta($this->now + $window, $this->reserve(), 0.000001);
            self::assertEqualsWithDelta($this->now + (2 * $window), $this->reserve(), 0.000001);
            self::assertEqualsWithDelta($this->now + (3 * $window), $this->reserve(), 0.000001);
        }
    }

    public function testExpiredFutureReservationsDoNotConsumeTheNextWindow(): void
    {
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => '1',
        ]));
        $this->now = 1.0;

        self::assertSame(1.0, $this->reserve());
        self::assertSame(1.0, $this->reserve());
        self::assertSame(2.0, $this->reserve());
        $this->now = 2.0;
        self::assertSame(2.0, $this->reserve());
        $this->now = 3.0;

        self::assertSame(3.0, $this->reserve());
        self::assertSame(3.0, $this->reserve());
    }

    public function testGlobalScheduleProtectsAlreadyReservedFutureSlots(): void
    {
        $this->provider->updateFromResponse('GET', '/slow', 'channel:1', false, 'scope', $this->limitedResponse(0.5));

        self::assertSame(0.5, $this->reserve(route: '/slow', globalLimit: 1));
        self::assertSame(1.5, $this->reserve(route: '/fast', globalLimit: 1));
    }

    public function testMixedFutureDelaysAlwaysRespectTheRollingGlobalCeiling(): void
    {
        mt_srand(42);
        $reservations = [];
        foreach (range(1, 100) as $request) {
            $reservations[] = $this->reserve(
                route: '/property/'.$request,
                globalLimit: 3,
                minimumDelay: mt_rand(0, 5000) / 1000
            );
        }

        foreach ($reservations as $end) {
            self::assertLessThanOrEqual(3, count(array_filter(
                $reservations,
                static fn (float $reservation): bool => $reservation > $end - 1.0 && $reservation <= $end
            )));
        }
    }

    public function testMinimumDelayIsReservedByRouteAndGlobalSchedules(): void
    {
        self::assertSame(1.0, $this->reserve(route: '/first', globalLimit: 1, minimumDelay: 1.0));
        self::assertSame(2.0, $this->reserve(route: '/second', globalLimit: 1, minimumDelay: 1.0));

        $this->provider = new MemoryRateLimitProvider(fn (): float => $this->now);
        $this->provider->updateFromResponse('GET', '/slow', 'channel:1', false, 'scope', $this->limitedResponse(0.5));

        self::assertSame(1.0, $this->reserve(route: '/slow', minimumDelay: 1.0));
        self::assertSame(1.5, $this->reserve(route: '/slow', minimumDelay: 1.0));
    }

    public function testRepeatedRejectedReservationsLeaveRouteAndGlobalStateUnchanged(): void
    {
        $this->provider->updateFromResponse('GET', '/slow', 'channel:1', false, 'scope', $this->limitedResponse(1.0));
        for ($attempt = 0; $attempt < 2; ++$attempt) {
            $reservation = $this->reservation(route: '/slow', rejectDelayed: true);
            self::assertFalse($reservation->reserved);
            self::assertSame(1.0, $reservation->sendAt);
        }

        self::assertSame(1.0, $this->reserve(route: '/slow'));
        self::assertSame(2.0, $this->reserve(route: '/slow'));

        $this->provider = new MemoryRateLimitProvider(fn (): float => $this->now);
        self::assertSame(0.0, $this->reserve(route: '/first', globalLimit: 1));
        for ($attempt = 0; $attempt < 2; ++$attempt) {
            $reservation = $this->reservation(route: '/second', globalLimit: 1, rejectDelayed: true);
            self::assertFalse($reservation->reserved);
            self::assertSame(1.0, $reservation->sendAt);
        }
        $this->now = 1.0;

        self::assertSame(1.0, $this->reserve(route: '/second', globalLimit: 1));
    }

    public function testPreAliasReservationsReduceLearnedCapacity(): void
    {
        self::assertSame(0.0, $this->reserve(route: '/channels/{channel_id}/messages'));
        self::assertSame(0.0, $this->reserve(route: '/channels/{channel_id}/messages'));
        $this->provider->updateFromResponse('GET', '/channels/{channel_id}/messages', 'channel:1', false, 'scope', new Response(200, [
            'X-RateLimit-Bucket' => 'messages',
            'X-RateLimit-Limit' => '2',
            'X-RateLimit-Remaining' => '1',
            'X-RateLimit-Reset-After' => '1',
        ]));

        self::assertSame(1.0, $this->reserve(route: '/channels/{channel_id}/messages'));
    }

    public function testUserAndShared429ResponsesBlockOnlyTheirRoutes(): void
    {
        foreach (['user', 'shared'] as $scope) {
            $this->provider = new MemoryRateLimitProvider(fn (): float => $this->now);
            $route = '/'.$scope;
            $this->provider->updateFromResponse('GET', $route, 'channel:1', false, 'scope', new Response(429, [
                'X-RateLimit-Scope' => $scope,
            ], '{"retry_after":0.25,"global":false}'));

            self::assertSame(0.25, $this->reserve(route: $route));
            self::assertSame(0.0, $this->reserve(route: '/unlimited', interaction: true));
        }
    }

    public function testBodyOnlyGlobal429PreservesSeekableBodyPosition(): void
    {
        $body = Utils::streamFor('{"retry_after":0.4,"global":true}');
        $body->read(3);
        $response = new Response(429, [], $body);
        $this->provider->updateFromResponse('GET', '/gateway', '', false, 'scope', $response);

        self::assertSame(3, $body->tell());
        self::assertSame(0.4, $this->reserve(route: '/gateway'));
        self::assertSame(0.0, $this->reserve(route: '/gateway', interaction: true));
    }

    private function reserve(
        string $majorScope = 'channel:1',
        bool $interaction = false,
        string $globalScope = 'scope',
        int $globalLimit = 50,
        string $route = '/channels/{channel_id}',
        float $minimumDelay = 0.0,
        bool $rejectDelayed = false
    ): float {
        return $this->reservation($majorScope, $interaction, $globalScope, $globalLimit, $route, $minimumDelay, $rejectDelayed)->sendAt;
    }

    private function reservation(
        string $majorScope = 'channel:1',
        bool $interaction = false,
        string $globalScope = 'scope',
        int $globalLimit = 50,
        string $route = '/channels/{channel_id}',
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

    private function limitedResponse(float $resetAfter): Response
    {
        return new Response(200, [
            'X-RateLimit-Bucket' => 'channel',
            'X-RateLimit-Limit' => '1',
            'X-RateLimit-Remaining' => '0',
            'X-RateLimit-Reset-After' => (string) $resetAfter,
        ]);
    }
}
