<?php

declare(strict_types=1);

namespace RestCord\Exception;

use Psr\Http\Message\ResponseInterface;

final class DiscordRequestException extends \RuntimeException
{
    public function __construct(
        public readonly int $statusCode,
        public readonly ?int $discordCode,
        public readonly ?string $discordMessage,
        public readonly mixed $errors,
        public readonly ResponseInterface $response
    ) {
        parent::__construct($discordMessage ?? $response->getReasonPhrase(), $statusCode);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getDiscordCode(): ?int
    {
        return $this->discordCode;
    }

    public function getDiscordMessage(): ?string
    {
        return $this->discordMessage;
    }

    public function getErrors(): mixed
    {
        return $this->errors;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
