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

final class StageInstancesApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function createStageInstance(array $options = []): mixed
    {
        return $this->createStageInstanceAsync($options)->wait();
    }

    public function createStageInstanceAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_stage_instance', $options);
    }

    public function deleteStageInstance(array $options = []): mixed
    {
        return $this->deleteStageInstanceAsync($options)->wait();
    }

    public function deleteStageInstanceAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_stage_instance', $options);
    }

    public function getStageInstance(array $options = []): mixed
    {
        return $this->getStageInstanceAsync($options)->wait();
    }

    public function getStageInstanceAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_stage_instance', $options);
    }

    public function updateStageInstance(array $options = []): mixed
    {
        return $this->updateStageInstanceAsync($options)->wait();
    }

    public function updateStageInstanceAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_stage_instance', $options);
    }
}
