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

namespace RestCord\RateLimit\Provider;

use Psr\Http\Message\ResponseInterface;
use RestCord\RateLimit\RateLimitReservation;
use RestCord\RateLimit\RateLimitStorageException;

class RedisRateLimitProvider implements RateLimitProviderInterface
{
    public const MAX_TTL = 604800;

    private const RESERVE_SCRIPT = <<<'LUA'
local aliasKey = KEYS[1]
local provisionalStateKey = KEYS[2]
local provisionalFutureKey = KEYS[3]
local globalStateKey = KEYS[4]
local globalScheduleKey = KEYS[5]
local canonicalPrefix = ARGV[1]
local majorHash = ARGV[2]
local interaction = ARGV[3] == '1'
local globalLimit = tonumber(ARGV[4])
local ttl = tonumber(ARGV[5])
local minimumDelay = tonumber(ARGV[6])
local rejectDelayed = ARGV[7] == '1'
local redisTime = redis.call('TIME')
local nowUs = (tonumber(redisTime[1]) * 1000000) + tonumber(redisTime[2])
local baselineUs = nowUs + math.ceil(minimumDelay * 1000000)

local alias = redis.call('GET', aliasKey)
local stateKey = provisionalStateKey
local futureKey = provisionalFutureKey
local usingProvisional = true
if alias and string.len(alias) == 64 and string.match(alias, '^[0-9a-f]+$') then
    stateKey = canonicalPrefix .. alias .. ':' .. majorHash
    futureKey = stateKey .. ':future'
    usingProvisional = false
end

local function routeCandidate(candidate)
    local resetAtUs = tonumber(redis.call('HGET', stateKey, 'reset_at_us'))
    if not resetAtUs then
        return candidate
    end

    if candidate < resetAtUs then
        local remaining = tonumber(redis.call('HGET', stateKey, 'remaining'))
        if remaining and remaining <= 0 then
            return resetAtUs
        end
        return candidate
    end

    local limit = tonumber(redis.call('HGET', stateKey, 'limit'))
    local windowUs = tonumber(redis.call('HGET', stateKey, 'window_us'))
    if not limit or limit < 1 or not windowUs or windowUs <= 0 then
        return candidate
    end

    while true do
        local windowIndex = math.floor(math.max(0, candidate - resetAtUs) / windowUs)
        local windowStartUs = resetAtUs + (windowIndex * windowUs)
        local windowEndUs = windowStartUs + windowUs
        if windowEndUs <= candidate then
            windowEndUs = candidate + 1
        end
        local reserved = redis.call('ZCOUNT', futureKey, string.format('%.0f', windowStartUs), '(' .. string.format('%.0f', windowEndUs))
        if reserved < limit then
            return candidate
        end
        candidate = windowEndUs
    end
end

local function globalCandidate(candidate)
    local globalResetAtUs = tonumber(redis.call('HGET', globalStateKey, 'reset_at_us'))
    if globalResetAtUs and globalResetAtUs > candidate then
        candidate = globalResetAtUs
    end

    while true do
        local reservations = redis.call(
            'ZRANGEBYSCORE',
            globalScheduleKey,
            '(' .. string.format('%.0f', candidate - 1000000),
            '(' .. string.format('%.0f', candidate + 1000000),
            'WITHSCORES'
        )
        local count = #reservations / 2
        if count < globalLimit then
            return candidate
        end

        local nextCandidate = nil
        for firstIndex = 1, count - globalLimit + 1 do
            local first = tonumber(reservations[((firstIndex - 1) * 2) + 2])
            local last = tonumber(reservations[((firstIndex + globalLimit - 2) * 2) + 2])
            if last - first < 1000000 and candidate > last - 1000000 and candidate < first + 1000000 then
                local boundary = first + 1000000
                if not nextCandidate or boundary > nextCandidate then
                    nextCandidate = boundary
                end
            end
        end
        if not nextCandidate then
            return candidate
        end
        candidate = math.max(candidate + 1, nextCandidate)
    end
end

local sendAtUs = baselineUs
while true do
    local previous = sendAtUs
    sendAtUs = routeCandidate(sendAtUs)
    if not interaction then
        sendAtUs = globalCandidate(sendAtUs)
    end
    if sendAtUs <= previous then
        break
    end
end

if rejectDelayed and sendAtUs > baselineUs then
    return {string.format('%.0f', nowUs), string.format('%.0f', sendAtUs), '0'}
end

if alias and usingProvisional then
    redis.call('DEL', aliasKey)
elseif alias then
    redis.call('EXPIRE', aliasKey, ttl)
end
redis.call('ZREMRANGEBYSCORE', futureKey, '-inf', string.format('%.0f', nowUs - (ttl * 1000000)))
if not interaction then
    redis.call('ZREMRANGEBYSCORE', globalScheduleKey, '-inf', string.format('%.0f', nowUs - 1000000))
end

local resetAtUs = tonumber(redis.call('HGET', stateKey, 'reset_at_us'))
local remaining = tonumber(redis.call('HGET', stateKey, 'remaining'))
if resetAtUs and sendAtUs < resetAtUs and remaining and remaining > 0 then
    redis.call('HINCRBY', stateKey, 'remaining', -1)
elseif resetAtUs and sendAtUs >= resetAtUs then
    local limit = tonumber(redis.call('HGET', stateKey, 'limit'))
    local windowUs = tonumber(redis.call('HGET', stateKey, 'window_us'))
    if limit and limit > 0 and windowUs and windowUs > 0 then
        local sequence = redis.call('HINCRBY', stateKey, 'sequence', 1)
        local member = redisTime[1] .. '-' .. redisTime[2] .. '-' .. sequence
        redis.call('ZADD', futureKey, string.format('%.0f', sendAtUs), member)
        redis.call('EXPIRE', futureKey, ttl)
    end
end
if redis.call('EXISTS', stateKey) == 1 then
    redis.call('EXPIRE', stateKey, ttl)
end
if usingProvisional then
    redis.call('HINCRBY', stateKey, 'pending', 1)
    redis.call('EXPIRE', stateKey, ttl)
end

if not interaction then
    local sequence = redis.call('HINCRBY', globalStateKey, 'sequence', 1)
    local member = redisTime[1] .. '-' .. redisTime[2] .. '-' .. sequence
    redis.call('ZADD', globalScheduleKey, string.format('%.0f', sendAtUs), member)
    redis.call('EXPIRE', globalStateKey, ttl)
    redis.call('EXPIRE', globalScheduleKey, ttl)
end

return {string.format('%.0f', nowUs), string.format('%.0f', sendAtUs), '1'}
LUA;

    private const UPDATE_SCRIPT = <<<'LUA'
local aliasKey = KEYS[1]
local provisionalStateKey = KEYS[2]
local provisionalFutureKey = KEYS[3]
local canonicalStateKey = KEYS[4]
local canonicalFutureKey = KEYS[5]
local globalStateKey = KEYS[6]
local globalScheduleKey = KEYS[7]
local suppliedBucketHash = ARGV[1]
local canonicalPrefix = ARGV[2]
local majorHash = ARGV[3]
local responseLimit = tonumber(ARGV[4])
local responseRemaining = tonumber(ARGV[5])
local resetAfter = tonumber(ARGV[6])
local resetAbsolute = tonumber(ARGV[7])
local routeRetryAfter = tonumber(ARGV[8])
local globalRetryAfter = tonumber(ARGV[9])
local ttl = tonumber(ARGV[10])
local redisTime = redis.call('TIME')
local nowUs = (tonumber(redisTime[1]) * 1000000) + tonumber(redisTime[2])

local alias = redis.call('GET', aliasKey)
local aliasIsValid = alias and string.len(alias) == 64 and string.match(alias, '^[0-9a-f]+$')
local bucketHash = suppliedBucketHash
if bucketHash == '' and aliasIsValid then
    bucketHash = alias
end

local targetStateKey = provisionalStateKey
local targetFutureKey = provisionalFutureKey
if bucketHash ~= '' then
    targetStateKey = canonicalPrefix .. bucketHash .. ':' .. majorHash
    targetFutureKey = targetStateKey .. ':future'
end
local usingProvisional = bucketHash == ''
local migratingProvisional = not aliasIsValid and suppliedBucketHash ~= ''

local mergedLimit = nil
local mergedRemaining = nil
local mergedResetAtUs = nil
local mergedWindowUs = nil
local provisionalPending = 0
if usingProvisional or migratingProvisional then
    provisionalPending = tonumber(redis.call('HGET', provisionalStateKey, 'pending')) or 0
end

local function mergeMinimum(current, value)
    if not value then
        return current
    end
    if not current or value < current then
        return value
    end
    return current
end

local function mergeMaximum(current, value)
    if not value then
        return current
    end
    if not current or value > current then
        return value
    end
    return current
end

local function mergeState(stateKey, futureKey, memberPrefix, copyFuture)
    if redis.call('EXISTS', stateKey) == 0 then
        return
    end

    local limit = tonumber(redis.call('HGET', stateKey, 'limit'))
    local remaining = tonumber(redis.call('HGET', stateKey, 'remaining'))
    local resetAtUs = tonumber(redis.call('HGET', stateKey, 'reset_at_us'))
    local windowUs = tonumber(redis.call('HGET', stateKey, 'window_us'))

    if resetAtUs and resetAtUs <= nowUs then
        if limit and limit > 0 and windowUs and windowUs > 0 then
            local windowIndex = math.floor(math.max(0, nowUs - resetAtUs) / windowUs)
            local windowStartUs = resetAtUs + (windowIndex * windowUs)
            local windowEndUs = windowStartUs + windowUs
            local reserved = redis.call('ZCOUNT', futureKey, string.format('%.0f', windowStartUs), '(' .. string.format('%.0f', windowEndUs))
            remaining = math.max(0, limit - reserved)
            resetAtUs = windowEndUs
        else
            limit = nil
            remaining = nil
            resetAtUs = nil
            windowUs = nil
        end
    end

    mergedLimit = mergeMinimum(mergedLimit, limit)
    mergedRemaining = mergeMinimum(mergedRemaining, remaining)
    mergedResetAtUs = mergeMaximum(mergedResetAtUs, resetAtUs)
    mergedWindowUs = mergeMaximum(mergedWindowUs, windowUs)

    if copyFuture and redis.call('EXISTS', futureKey) == 1 then
        local reservations = redis.call('ZRANGE', futureKey, 0, -1, 'WITHSCORES')
        for index = 1, #reservations, 2 do
            redis.call('ZADD', targetFutureKey, reservations[index + 1], memberPrefix .. reservations[index])
        end
    end
end

mergeState(targetStateKey, targetFutureKey, '', false)

if migratingProvisional then
    mergeState(provisionalStateKey, provisionalFutureKey, 'p:', true)
end
if aliasIsValid and suppliedBucketHash ~= '' and alias ~= bucketHash then
    local oldStateKey = canonicalPrefix .. alias .. ':' .. majorHash
    mergeState(oldStateKey, oldStateKey .. ':future', 'o:' .. alias .. ':', true)
end

mergedLimit = mergeMinimum(mergedLimit, responseLimit)
if responseRemaining and (usingProvisional or migratingProvisional) then
    responseRemaining = math.max(0, responseRemaining - math.max(0, provisionalPending - 1))
end
mergedRemaining = mergeMinimum(mergedRemaining, responseRemaining)
local responseResetAtUs = nil
local responseWindowUs = nil
if resetAfter then
    responseWindowUs = math.ceil(resetAfter * 1000000)
    responseResetAtUs = nowUs + responseWindowUs
elseif resetAbsolute then
    responseResetAtUs = math.floor((resetAbsolute * 1000000) + 0.5)
    responseWindowUs = math.max(0, responseResetAtUs - nowUs)
end
if routeRetryAfter then
    local routeRetryAfterUs = math.ceil(routeRetryAfter * 1000000)
    responseResetAtUs = mergeMaximum(responseResetAtUs, nowUs + routeRetryAfterUs)
    responseWindowUs = mergeMaximum(responseWindowUs, routeRetryAfterUs)
    mergedRemaining = mergeMinimum(mergedRemaining, 0)
end
mergedResetAtUs = mergeMaximum(mergedResetAtUs, responseResetAtUs)
mergedWindowUs = mergeMaximum(mergedWindowUs, responseWindowUs)

redis.call('HDEL', targetStateKey, 'limit', 'remaining', 'reset_at_us', 'window_us')
if mergedLimit then
    redis.call('HSET', targetStateKey, 'limit', mergedLimit)
end
if mergedRemaining then
    redis.call('HSET', targetStateKey, 'remaining', mergedRemaining)
end
if mergedResetAtUs then
    redis.call('HSET', targetStateKey, 'reset_at_us', string.format('%.0f', mergedResetAtUs))
end
if mergedWindowUs then
    redis.call('HSET', targetStateKey, 'window_us', string.format('%.0f', mergedWindowUs))
end
if usingProvisional and provisionalPending > 1 then
    redis.call('HSET', targetStateKey, 'pending', provisionalPending - 1)
elseif usingProvisional then
    redis.call('HDEL', targetStateKey, 'pending')
end
if redis.call('EXISTS', targetStateKey) == 1 then
    redis.call('EXPIRE', targetStateKey, ttl)
end
if redis.call('EXISTS', targetFutureKey) == 1 then
    redis.call('EXPIRE', targetFutureKey, ttl)
end

if suppliedBucketHash ~= '' then
    redis.call('SET', aliasKey, suppliedBucketHash, 'EX', ttl)
    if provisionalStateKey ~= canonicalStateKey then
        redis.call('DEL', provisionalStateKey, provisionalFutureKey)
    end
elseif aliasIsValid then
    redis.call('EXPIRE', aliasKey, ttl)
elseif alias then
    redis.call('DEL', aliasKey)
end

if globalRetryAfter then
    local globalResetAtUs = nowUs + math.ceil(globalRetryAfter * 1000000)
    local currentResetAtUs = tonumber(redis.call('HGET', globalStateKey, 'reset_at_us'))
    if not currentResetAtUs or globalResetAtUs > currentResetAtUs then
        redis.call('HSET', globalStateKey, 'reset_at_us', string.format('%.0f', globalResetAtUs))
    end
    redis.call('EXPIRE', globalStateKey, ttl)
    if redis.call('EXISTS', globalScheduleKey) == 1 then
        redis.call('EXPIRE', globalScheduleKey, ttl)
    end
end

return 1
LUA;

    public array $options;

    private \Redis $redis;

    private ?float $unhealthyUntil = null;

    public function __construct(array $options = [])
    {
        $this->options = $this->validateOptions($options);
        $this->redis   = $this->options['client'] ?? new \Redis();
        if ($this->options['client'] === null) {
            try {
                if (!$this->redis->connect($this->options['host'], $this->options['port'])) {
                    throw new \RedisException('Redis connection failed.');
                }
            } catch (\Throwable $exception) {
                throw new RateLimitStorageException('Unable to connect to Redis rate-limit storage.', 0, $exception);
            }
        }
    }

    public function validateOptions(array $options): array
    {
        $defaults = ['prefix' => 'restcord.ratelimit.', 'host' => '127.0.0.1', 'port' => 6379, 'client' => null];
        foreach ($options as $name => $_) {
            if (!array_key_exists($name, $defaults)) {
                throw new \InvalidArgumentException("Unknown Redis rate limit option: {$name}.");
            }
        }
        $options += $defaults;

        if (!is_string($options['prefix']) || !is_string($options['host']) || !is_int($options['port']) || $options['port'] < 1 || $options['port'] > 65535 || ($options['client'] !== null && !$options['client'] instanceof \Redis)) {
            throw new \InvalidArgumentException('Redis rate limit options have invalid types or values.');
        }

        return $options;
    }

    public function getKey(string $key): string
    {
        return $this->options['prefix'].$key;
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
        if ($this->unhealthyUntil !== null && microtime(true) < $this->unhealthyUntil) {
            throw new RateLimitStorageException('Redis rate-limit state is unsafe after a failed response update.');
        }

        $routeHash           = hash('sha256', strtoupper($method).' '.$route);
        $majorHash           = hash('sha256', $majorScope);
        $globalHash          = hash('sha256', $globalScope);
        $provisionalStateKey = $this->getKey('state:route:'.$routeHash.':'.$majorHash);
        $globalStateKey      = $this->getKey('global:'.$globalHash);

        try {
            $reservation = $this->redis->eval(self::RESERVE_SCRIPT, [
                $this->getKey('alias:'.$routeHash),
                $provisionalStateKey,
                $provisionalStateKey.':future',
                $globalStateKey,
                $globalStateKey.':schedule',
                $this->getKey('state:bucket:'),
                $majorHash,
                $interaction ? '1' : '0',
                (string) $globalLimit,
                (string) self::MAX_TTL,
                (string) $minimumDelay,
                $rejectDelayed ? '1' : '0',
            ], 5);
            if (!is_array($reservation) || count($reservation) !== 3 || !is_numeric($reservation[0]) || !is_numeric($reservation[1]) || !in_array((string) $reservation[2], ['0', '1'], true)) {
                throw new \UnexpectedValueException('Redis returned an invalid reservation time.');
            }
            $redisNowUs    = (float) $reservation[0];
            $redisSendAtUs = (float) $reservation[1];
            if (!is_finite($redisNowUs) || !is_finite($redisSendAtUs) || $redisSendAtUs < $redisNowUs) {
                throw new \UnexpectedValueException('Redis returned an invalid reservation time.');
            }
            $sendAt   = microtime(true) + (($redisSendAtUs - $redisNowUs) / 1000000);
            $reserved = (string) $reservation[2] === '1';
        } catch (\Throwable $exception) {
            throw new RateLimitStorageException('Unable to reserve Redis rate-limit capacity.', 0, $exception);
        }

        $this->unhealthyUntil = null;

        return new RateLimitReservation($sendAt, $reserved);
    }

    public function updateFromResponse(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        ResponseInterface $response
    ): void {
        $routeHash                 = hash('sha256', strtoupper($method).' '.$route);
        $majorHash                 = hash('sha256', $majorScope);
        $globalHash                = hash('sha256', $globalScope);
        $bucket                    = trim($response->getHeaderLine('X-RateLimit-Bucket'));
        $bucketHash                = $bucket === '' ? '' : hash('sha256', $bucket);
        $scope                     = strtolower(trim($response->getHeaderLine('X-RateLimit-Scope')));
        [$retryAfter, $bodyGlobal] = $response->getStatusCode() === 429
            ? $this->retryState($response)
            : [null, false];
        $global = $scope === 'global'
            || strtolower(trim($response->getHeaderLine('X-RateLimit-Global'))) === 'true'
            || $bodyGlobal;
        $limit            = $global ? null : $this->integerHeader($response, 'X-RateLimit-Limit', true);
        $remaining        = $global ? null : $this->integerHeader($response, 'X-RateLimit-Remaining');
        $resetAfter       = $global ? null : $this->floatHeader($response, 'X-RateLimit-Reset-After');
        $resetAbsolute    = $global || $resetAfter !== null ? null : $this->floatHeader($response, 'X-RateLimit-Reset');
        $routeRetryAfter  = $response->getStatusCode() === 429 && !$global ? $retryAfter : null;
        $globalRetryAfter = null;
        if (!$interaction && $global) {
            $absoluteReset    = $this->floatHeader($response, 'X-RateLimit-Reset');
            $globalRetryAfter = $retryAfter
                ?? $this->floatHeader($response, 'X-RateLimit-Reset-After')
                ?? ($absoluteReset === null ? null : max(0.0, $absoluteReset - microtime(true)));
        }

        $provisionalStateKey = $this->getKey('state:route:'.$routeHash.':'.$majorHash);
        $canonicalStateKey   = $this->getKey('state:bucket:'.($bucketHash === '' ? hash('sha256', '') : $bucketHash).':'.$majorHash);
        $globalStateKey      = $this->getKey('global:'.$globalHash);
        $knownReset          = $this->knownReset($response, $retryAfter);

        try {
            $updated = $this->redis->eval(self::UPDATE_SCRIPT, [
                $this->getKey('alias:'.$routeHash),
                $provisionalStateKey,
                $provisionalStateKey.':future',
                $canonicalStateKey,
                $canonicalStateKey.':future',
                $globalStateKey,
                $globalStateKey.':schedule',
                $bucketHash,
                $this->getKey('state:bucket:'),
                $majorHash,
                $limit === null ? '' : (string) $limit,
                $remaining === null ? '' : (string) $remaining,
                $resetAfter === null ? '' : (string) $resetAfter,
                $resetAbsolute === null ? '' : (string) $resetAbsolute,
                $routeRetryAfter === null ? '' : (string) $routeRetryAfter,
                $globalRetryAfter === null ? '' : (string) $globalRetryAfter,
                (string) self::MAX_TTL,
            ], 7);
            if ($updated !== 1) {
                throw new \UnexpectedValueException('Redis did not confirm the rate-limit update.');
            }
        } catch (\Throwable $exception) {
            $this->unhealthyUntil = max($this->unhealthyUntil ?? 0.0, $knownReset ?? microtime(true));

            throw new RateLimitStorageException('Unable to update Redis rate-limit state.', 0, $exception);
        }
    }

    private function integerHeader(ResponseInterface $response, string $name, bool $positive = false): ?int
    {
        $value = trim($response->getHeaderLine($name));
        if (preg_match('/^\d+$/D', $value) !== 1) {
            return null;
        }

        $value = (int) $value;

        return !$positive || $value > 0 ? $value : null;
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

    private function retryState(ResponseInterface $response): array
    {
        $body     = $response->getBody();
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
        $retryAfter = is_array($payload) ? ($payload['retry_after'] ?? null) : null;
        if ((!is_int($retryAfter) && !is_float($retryAfter) && !is_string($retryAfter)) || !is_numeric($retryAfter)) {
            $retryAfter = $this->floatHeader($response, 'Retry-After');
        } else {
            $retryAfter = (float) $retryAfter;
            if (!is_finite($retryAfter) || $retryAfter < 0.0) {
                $retryAfter = $this->floatHeader($response, 'Retry-After');
            }
        }

        return [$retryAfter, is_array($payload) && ($payload['global'] ?? false) === true];
    }

    private function knownReset(ResponseInterface $response, ?float $retryAfter): ?float
    {
        $now           = microtime(true);
        $resetAfter    = $this->floatHeader($response, 'X-RateLimit-Reset-After');
        $resetAbsolute = $this->floatHeader($response, 'X-RateLimit-Reset');
        $knownReset    = $resetAfter === null ? $resetAbsolute : $now + $resetAfter;
        if ($retryAfter !== null) {
            $knownReset = max($knownReset ?? 0.0, $now + $retryAfter);
        }

        return $knownReset === null ? null : min($knownReset, $now + self::MAX_TTL);
    }
}
