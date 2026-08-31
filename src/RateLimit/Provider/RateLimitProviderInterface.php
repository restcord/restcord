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
