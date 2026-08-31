<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class InteractionsApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function createInteractionResponse(array $options = []): mixed
    {
        return $this->createInteractionResponseAsync($options)->wait();
    }

    public function createInteractionResponseAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_interaction_response', $options);
    }
}
