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
