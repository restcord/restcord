<?php

declare(strict_types=1);

namespace RestCord\RateLimit\Provider;

use Psr\Http\Message\ResponseInterface;
use RestCord\RateLimit\RateLimitReservation;

interface RateLimitProviderInterface
{
    public function reserve(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        int $globalLimit,
        float $minimumDelay = 0.0,
        bool $rejectDelayed = false
    ): RateLimitReservation;

    public function updateFromResponse(
        string $method,
        string $route,
        string $majorScope,
        bool $interaction,
        string $globalScope,
        ResponseInterface $response
    ): void;
}
