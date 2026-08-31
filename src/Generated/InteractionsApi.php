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
