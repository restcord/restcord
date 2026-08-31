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

final class GatewayApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getBotGateway(array $options = []): mixed
    {
        return $this->getBotGatewayAsync($options)->wait();
    }

    public function getBotGatewayAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_bot_gateway', $options);
    }

    public function getGateway(array $options = []): mixed
    {
        return $this->getGatewayAsync($options)->wait();
    }

    public function getGatewayAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_gateway', $options);
    }
}
