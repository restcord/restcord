<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class SoundboardDefaultSoundsApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getSoundboardDefaultSounds(array $options = []): mixed
    {
        return $this->getSoundboardDefaultSoundsAsync($options)->wait();
    }

    public function getSoundboardDefaultSoundsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_soundboard_default_sounds', $options);
    }
}
