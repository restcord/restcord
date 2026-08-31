<?php

declare(strict_types=1);

namespace RestCord\RateLimit;

use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RestCord\RateLimit\Provider\RateLimitProviderInterface;

final class RateLimiter
{
    public const OPTION = '_restcord_rate_limit';

    private readonly \Closure $clock;

    private readonly LoggerInterface $logger;

    public function __construct(
        private readonly RateLimitProviderInterface $provider,
        private readonly bool $throwOnRatelimit = false,
        private readonly int $globalLimit = 50,
        ?LoggerInterface $logger = null,
        ?callable $clock = null
    ) {
        $this->logger = $logger ?? new NullLogger();
        $this->clock = $clock === null ? static fn (): float => microtime(true) : $clock(...);
    }

    public function __invoke(callable $handler): callable
    {
        return function (RequestInterface $request, array $options) use ($handler): PromiseInterface {
            try {
                $metadata = $options[self::OPTION];
                unset($options[self::OPTION]);
            } catch (\Throwable $exception) {
                return Create::rejectionFor($exception);
            }

            return $this->attempt($handler, $request, $options, $metadata, 0, 0.0);
        };
    }

    private function attempt(
        callable $handler,
        RequestInterface $request,
        array $options,
        array $metadata,
        int $retries,
        float $retryAt
    ): PromiseInterface {
        try {
            $now = ($this->clock)();
            $minimumDelay = max(
                0.0,
                $retryAt - $now,
                ((float) ($options['delay'] ?? 0)) / 1000
            );
            $reservation = $this->provider->reserve(
                $metadata['method'],
                $metadata['route'],
                $metadata['majorScope'],
                $metadata['interactionRoute'],
                $metadata['globalScope'],
                $this->globalLimit,
                $minimumDelay,
                $this->throwOnRatelimit
            );
            if (!is_finite($reservation->sendAt) || $reservation->sendAt < $now + $minimumDelay - 0.000001) {
                throw new \UnexpectedValueException('Rate-limit provider returned an invalid reservation time.');
            }
            $delay = max(0.0, $reservation->sendAt - ($this->clock)());
            if (!$reservation->reserved) {
                return Create::rejectionFor(new RatelimitException($metadata['operationId'], $delay));
            }
            $attemptOptions = $options;
            $attemptOptions['delay'] = ceil($delay * 1000);
            $promise = $handler($request, $attemptOptions);
        } catch (\Throwable $exception) {
            return Create::rejectionFor($exception);
        }

        return $promise->then(function (ResponseInterface $response) use ($handler, $request, $options, $metadata, $retries): ResponseInterface|PromiseInterface {
            $retryAfter = null;
            if ($response->getStatusCode() === 429) {
                [$retryAfter, $response] = $this->retryAfter($response);
            }

            if (!$this->updateProvider($metadata, $response)) {
                return $response;
            }
            if ($response->getStatusCode() !== 429) {
                return $response;
            }
            if ($this->throwOnRatelimit || $retryAfter === null || $retries >= 3) {
                throw new RatelimitException($metadata['operationId'], $retryAfter ?? 0.0, $response);
            }

            return $this->attempt(
                $handler,
                $request,
                $options,
                $metadata,
                $retries + 1,
                ($this->clock)() + $retryAfter
            );
        });
    }

    private function updateProvider(array $metadata, ResponseInterface $response): bool
    {
        try {
            $this->provider->updateFromResponse(
                $metadata['method'],
                $metadata['route'],
                $metadata['majorScope'],
                $metadata['interactionRoute'],
                $metadata['globalScope'],
                $response
            );
        } catch (RateLimitStorageException) {
            $this->logger->warning('Rate-limit response update failed.', [
                'operationId' => $metadata['operationId'],
                'status' => $response->getStatusCode(),
            ]);

            return false;
        }

        return true;
    }

    private function retryAfter(ResponseInterface $response): array
    {
        $body = $response->getBody();
        if ($body->isSeekable()) {
            $position = $body->tell();
            $body->rewind();
            $content = $body->getContents();
            $body->seek($position);
        } else {
            $content = $body->getContents();
            $response = $response->withBody(Utils::streamFor($content));
        }

        $payload = json_decode($content, true);
        $value = is_array($payload) ? ($payload['retry_after'] ?? null) : null;
        if ((is_int($value) || is_float($value)) && is_finite((float) $value) && $value >= 0) {
            return [(float) $value, $response];
        }

        $value = trim($response->getHeaderLine('Retry-After'));
        if ($value !== '' && is_numeric($value) && is_finite((float) $value) && (float) $value >= 0) {
            return [(float) $value, $response];
        }

        return [null, $response];
    }
}
