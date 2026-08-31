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

final class SkusApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getSkuSubscription(array $options = []): mixed
    {
        return $this->getSkuSubscriptionAsync($options)->wait();
    }

    public function getSkuSubscriptionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_sku_subscription', $options);
    }

    public function getSkuSubscriptions(array $options = []): mixed
    {
        return $this->getSkuSubscriptionsAsync($options)->wait();
    }

    public function getSkuSubscriptionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_sku_subscriptions', $options);
    }
}
