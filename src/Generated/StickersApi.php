<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class StickersApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getSticker(array $options = []): mixed
    {
        return $this->getStickerAsync($options)->wait();
    }

    public function getStickerAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_sticker', $options);
    }
}
