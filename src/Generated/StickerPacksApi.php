<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class StickerPacksApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getStickerPack(array $options = []): mixed
    {
        return $this->getStickerPackAsync($options)->wait();
    }

    public function getStickerPackAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_sticker_pack', $options);
    }

    public function listStickerPacks(array $options = []): mixed
    {
        return $this->listStickerPacksAsync($options)->wait();
    }

    public function listStickerPacksAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_sticker_packs', $options);
    }
}
