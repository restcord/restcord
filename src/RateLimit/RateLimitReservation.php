<?php

declare(strict_types=1);

namespace RestCord\RateLimit;

final readonly class RateLimitReservation
{
    public function __construct(
        public float $sendAt,
        public bool $reserved
    ) {
    }
}
