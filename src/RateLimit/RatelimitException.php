<?php

declare(strict_types=1);

namespace RestCord\RateLimit;

use Psr\Http\Message\ResponseInterface;

final class RatelimitException extends \RuntimeException
{
    public function __construct(
        private readonly string $operationId,
        private readonly float $retryAfter,
        private readonly ?ResponseInterface $response = null
    ) {
        parent::__construct("Discord rate limit reached for {$operationId}; retry after {$retryAfter} seconds.");
    }

    public function getOperationId(): string
    {
        return $this->operationId;
    }

    public function getRetryAfter(): float
    {
        return $this->retryAfter;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
