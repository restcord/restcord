<?php

declare(strict_types=1);

namespace RestCord\RateLimit\Provider;

use Psr\Http\Message\ResponseInterface;
use RestCord\RateLimit\RateLimitReservation;

class MemoryRateLimitProvider implements RateLimitProviderInterface
{
    private array $aliases = [];

    private array $buckets = [];

    private \Closure $clock;

    private array $globalReservations = [];

    private array $globalResetAt = [];

    private array $pending = [];

    public function __construct(?callable $clock = null)
    {
        $this->clock = $clock === null
            ? static fn (): float => microtime(true)
            : $clock(...);
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
        if ($globalLimit < 1) {
            throw new \InvalidArgumentException('globalLimit must be a positive integer.');
        }
        if (!is_finite($minimumDelay) || $minimumDelay < 0.0) {
            throw new \InvalidArgumentException('minimumDelay must be a finite non-negative number.');
        }

        $now = ($this->clock)();
        $baseline = $now + $minimumDelay;
        if (!is_finite($baseline)) {
            throw new \InvalidArgumentException('minimumDelay produces an invalid reservation time.');
        }
        $routeKey = $this->routeKey($method, $route);
        $bucketKey = $this->stateKey($routeKey, $majorScope);
        $this->expireBucket($bucketKey, $now);

        $globalKey = hash('sha256', $globalScope);
        if (!$interaction) {
            $this->globalReservations[$globalKey] = array_values(array_filter(
                $this->globalReservations[$globalKey] ?? [],
                static fn (float $reservation): bool => $reservation > $now - 1.0
            ));
        }

        $sendAt = $baseline;
        do {
            $previous = $sendAt;
            $sendAt = max($sendAt, $this->routeSendAt($bucketKey, $sendAt));
            if (!$interaction) {
                $sendAt = max($sendAt, $this->globalSendAt($globalKey, $globalLimit, $sendAt));
            }
        } while ($sendAt > $previous);

        if ($rejectDelayed && $sendAt > $baseline) {
            return new RateLimitReservation($sendAt, false);
        }

        $this->reserveRoute($bucketKey, $sendAt);
        if (!isset($this->aliases[$routeKey])) {
            $this->pending[$bucketKey] = ($this->pending[$bucketKey] ?? 0) + 1;
        }
        if (!$interaction) {
            $this->globalReservations[$globalKey][] = $sendAt;
            sort($this->globalReservations[$globalKey], SORT_NUMERIC);
        }

        return new RateLimitReservation($sendAt, true);
    }

    public function updateFromResponse(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        ResponseInterface $response
    ): void {
        $now = ($this->clock)();
        $routeKey = $this->routeKey($method, $route);
        $currentKey = $this->stateKey($routeKey, $majorScope);
        $this->expireBucket($currentKey, $now);
        [$retryAfter, $bodyGlobal] = $response->getStatusCode() === 429
            ? $this->retryState($response)
            : [null, false];
        $global = $this->isGlobalResponse($response) || $bodyGlobal;
        $responseState = $global ? null : $this->responseState($response, $now, $retryAfter);
        $pending = $this->pending[$currentKey] ?? 0;
        if ($responseState !== null && isset($responseState['remaining'])) {
            $responseState['remaining'] = max(0, $responseState['remaining'] - max(0, $pending - 1));
        }
        $bucket = trim($response->getHeaderLine('X-RateLimit-Bucket'));

        if (!$interaction && $global) {
            $absoluteReset = $this->floatHeader($response, 'X-RateLimit-Reset');
            $retryAfter ??= $this->floatHeader($response, 'X-RateLimit-Reset-After')
                ?? ($absoluteReset === null ? null : max(0.0, $absoluteReset - $now));
        }
        if (!$interaction && $global && $retryAfter !== null) {
            $globalKey = hash('sha256', $globalScope);
            $this->globalResetAt[$globalKey] = max($this->globalResetAt[$globalKey] ?? 0.0, $now + $retryAfter);
        }

        if ($bucket === '') {
            $state = $this->mergeStates($this->buckets[$currentKey] ?? null, $responseState);
            if ($state !== null) {
                $this->buckets[$currentKey] = $state;
            }
            if ($pending > 1) {
                $this->pending[$currentKey] = $pending - 1;
            } else {
                unset($this->pending[$currentKey]);
            }

            return;
        }

        $canonicalKey = $this->canonicalKey($bucket, $majorScope);
        $this->expireBucket($canonicalKey, $now);
        $states = [$this->buckets[$canonicalKey] ?? null];
        if ($currentKey !== $canonicalKey) {
            $states[] = $this->buckets[$currentKey] ?? null;
        }
        $states[] = $responseState;
        $state = $this->mergeStates(...$states);
        $this->aliases[$routeKey] = $bucket;
        if ($state !== null) {
            $this->buckets[$canonicalKey] = $state;
        }
        if (str_starts_with($currentKey, 'route:') && $currentKey !== $canonicalKey) {
            unset($this->buckets[$currentKey]);
        }
        unset($this->pending[$currentKey]);
    }

    private function routeKey(string $method, string $route): string
    {
        return hash('sha256', strtoupper($method).' '.$route);
    }

    private function stateKey(string $routeKey, string $majorScope): string
    {
        return isset($this->aliases[$routeKey])
            ? $this->canonicalKey($this->aliases[$routeKey], $majorScope)
            : 'route:'.$routeKey.':'.$this->majorKey($majorScope);
    }

    private function canonicalKey(string $bucket, string $majorScope): string
    {
        return 'bucket:'.hash('sha256', $bucket).':'.$this->majorKey($majorScope);
    }

    private function majorKey(string $majorScope): string
    {
        return hash('sha256', $majorScope);
    }

    private function globalSendAt(string $globalKey, int $limit, float $candidate): float
    {
        $candidate = max($candidate, $this->globalResetAt[$globalKey] ?? 0.0);
        $reservations = $this->globalReservations[$globalKey] ?? [];
        while (true) {
            $conflictUntil = null;
            $anchors = [$candidate];
            foreach ($reservations as $reservation) {
                if ($reservation >= $candidate && $reservation < $candidate + 1.0) {
                    $anchors[] = $reservation;
                }
            }
            foreach ($anchors as $anchor) {
                $window = array_values(array_filter(
                    $reservations,
                    static fn (float $reservation): bool => $reservation > $anchor - 1.0 && $reservation <= $anchor
                ));
                if (count($window) >= $limit) {
                    $boundary = min($window) + 1.0;
                    $conflictUntil = max($conflictUntil ?? $candidate, $boundary > $candidate ? $boundary : $candidate + 0.000001);
                }
            }
            if ($conflictUntil === null) {
                return $candidate;
            }

            $candidate = $conflictUntil;
        }
    }

    private function routeSendAt(string $bucketKey, float $candidate): float
    {
        $state = $this->buckets[$bucketKey] ?? null;
        if ($state === null || !isset($state['resetAt'])) {
            return $candidate;
        }
        if ($candidate < $state['resetAt']) {
            return ($state['remaining'] ?? 1) > 0 ? $candidate : $state['resetAt'];
        }
        if (!isset($state['limit'], $state['window']) || $state['window'] <= 0.0) {
            return $candidate;
        }

        while (true) {
            $windowIndex = $this->windowIndex($candidate, $state['resetAt'], $state['window']);
            $windowEnd = $state['resetAt'] + (($windowIndex + 1) * $state['window']);
            $reservations = array_filter(
                $state['future'] ?? [],
                fn (float $reservation): bool => $this->windowIndex($reservation, $state['resetAt'], $state['window']) === $windowIndex
            );
            if (count($reservations) < $state['limit']) {
                return $candidate;
            }

            $candidate = $windowEnd > $candidate ? $windowEnd : $candidate + $state['window'];
        }
    }

    private function windowIndex(float $timestamp, float $resetAt, float $window): int
    {
        $index = (int) floor(($timestamp - $resetAt) / $window);
        while ($timestamp < $resetAt + ($index * $window)) {
            --$index;
        }
        while ($timestamp >= $resetAt + (($index + 1) * $window)) {
            ++$index;
        }

        return $index;
    }

    private function reserveRoute(string $bucketKey, float $sendAt): void
    {
        if (!isset($this->buckets[$bucketKey]['resetAt'])) {
            return;
        }
        if ($sendAt < $this->buckets[$bucketKey]['resetAt']) {
            if (isset($this->buckets[$bucketKey]['remaining']) && $this->buckets[$bucketKey]['remaining'] > 0) {
                --$this->buckets[$bucketKey]['remaining'];
            }

            return;
        }

        $this->buckets[$bucketKey]['future'][] = $sendAt;
    }

    private function expireBucket(string $bucketKey, float $now): void
    {
        if (!isset($this->buckets[$bucketKey]['resetAt']) || $this->buckets[$bucketKey]['resetAt'] > $now) {
            return;
        }
        if (!isset($this->buckets[$bucketKey]['limit'], $this->buckets[$bucketKey]['window']) || $this->buckets[$bucketKey]['window'] <= 0.0) {
            unset($this->buckets[$bucketKey]);

            return;
        }

        $window = $this->buckets[$bucketKey]['window'];
        $windowIndex = $this->windowIndex($now, $this->buckets[$bucketKey]['resetAt'], $window);
        $windowEnd = $this->buckets[$bucketKey]['resetAt'] + (($windowIndex + 1) * $window);
        $future = array_values(array_filter(
            $this->buckets[$bucketKey]['future'] ?? [],
            fn (float $reservation): bool => $this->windowIndex($reservation, $this->buckets[$bucketKey]['resetAt'], $window) >= $windowIndex
        ));
        $reserved = count(array_filter(
            $future,
            fn (float $reservation): bool => $this->windowIndex($reservation, $this->buckets[$bucketKey]['resetAt'], $window) === $windowIndex
        ));
        $this->buckets[$bucketKey]['remaining'] = max(0, $this->buckets[$bucketKey]['limit'] - $reserved);
        $this->buckets[$bucketKey]['resetAt'] = $windowEnd;
        $this->buckets[$bucketKey]['future'] = $future;
    }

    private function responseState(ResponseInterface $response, float $now, ?float $retryAfter): ?array
    {
        $limit = $this->integerHeader($response, 'X-RateLimit-Limit');
        $remaining = $this->integerHeader($response, 'X-RateLimit-Remaining');
        $resetAfter = $this->floatHeader($response, 'X-RateLimit-Reset-After');
        $reset = $this->floatHeader($response, 'X-RateLimit-Reset');
        $resetAt = $resetAfter !== null ? $now + $resetAfter : $reset;
        $window = $resetAfter ?? ($resetAt === null ? null : max(0.0, $resetAt - $now));
        if ($response->getStatusCode() === 429 && $retryAfter !== null) {
            $remaining = 0;
            $resetAt = max($resetAt ?? 0.0, $now + $retryAfter);
            $window = max($window ?? 0.0, $retryAfter);
        }

        if ($limit === null && $remaining === null && $resetAt === null) {
            return null;
        }

        $state = ['future' => []];
        if ($limit !== null && $limit > 0) {
            $state['limit'] = $limit;
        }
        if ($remaining !== null) {
            $state['remaining'] = $remaining;
        }
        if ($resetAt !== null) {
            $state['resetAt'] = $resetAt;
            $state['window'] = $window;
        }

        return $state;
    }

    private function integerHeader(ResponseInterface $response, string $name): ?int
    {
        $value = trim($response->getHeaderLine($name));

        return preg_match('/^\d+$/D', $value) === 1 ? (int) $value : null;
    }

    private function floatHeader(ResponseInterface $response, string $name): ?float
    {
        $value = trim($response->getHeaderLine($name));
        if ($value === '' || !is_numeric($value)) {
            return null;
        }

        $value = (float) $value;

        return is_finite($value) && $value >= 0.0 ? $value : null;
    }

    private function isGlobalResponse(ResponseInterface $response): bool
    {
        return strtolower(trim($response->getHeaderLine('X-RateLimit-Scope'))) === 'global'
            || strtolower(trim($response->getHeaderLine('X-RateLimit-Global'))) === 'true';
    }

    private function retryState(ResponseInterface $response): array
    {
        $body = $response->getBody();
        $position = null;
        if ($body->isSeekable()) {
            try {
                $position = $body->tell();
                $body->rewind();
            } catch (\Throwable) {
                $position = null;
            }
        }
        $payload = json_decode((string) $body, true);
        if ($position !== null) {
            try {
                $body->seek($position);
            } catch (\Throwable) {
            }
        }
        $value = is_array($payload) ? ($payload['retry_after'] ?? null) : null;
        if ((!is_int($value) && !is_float($value) && !is_string($value)) || !is_numeric($value)) {
            $value = $this->floatHeader($response, 'Retry-After');
        } else {
            $value = (float) $value;
            if (!is_finite($value) || $value < 0.0) {
                $value = $this->floatHeader($response, 'Retry-After');
            }
        }

        return [$value, is_array($payload) && ($payload['global'] ?? false) === true];
    }

    private function mergeStates(?array ...$states): ?array
    {
        $states = array_values(array_filter($states));
        if ($states === []) {
            return null;
        }

        $merged = ['future' => []];
        foreach ($states as $state) {
            foreach (['limit', 'remaining'] as $name) {
                if (isset($state[$name])) {
                    $merged[$name] = isset($merged[$name]) ? min($merged[$name], $state[$name]) : $state[$name];
                }
            }
            foreach (['resetAt', 'window'] as $name) {
                if (isset($state[$name])) {
                    $merged[$name] = isset($merged[$name]) ? max($merged[$name], $state[$name]) : $state[$name];
                }
            }
            $merged['future'] = [...$merged['future'], ...($state['future'] ?? [])];
        }
        sort($merged['future'], SORT_NUMERIC);
        if (isset($merged['limit'], $merged['remaining'])) {
            $merged['remaining'] = min($merged['remaining'], $merged['limit']);
        }

        return $merged;
    }
}
