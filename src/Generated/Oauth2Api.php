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

final class Oauth2Api
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getMyOauth2Application(array $options = []): mixed
    {
        return $this->getMyOauth2ApplicationAsync($options)->wait();
    }

    public function getMyOauth2ApplicationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_my_oauth2_application', $options);
    }

    public function getMyOauth2Authorization(array $options = []): mixed
    {
        return $this->getMyOauth2AuthorizationAsync($options)->wait();
    }

    public function getMyOauth2AuthorizationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_my_oauth2_authorization', $options);
    }

    public function getOpenidConnectUserinfo(array $options = []): mixed
    {
        return $this->getOpenidConnectUserinfoAsync($options)->wait();
    }

    public function getOpenidConnectUserinfoAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_openid_connect_userinfo', $options);
    }

    public function getPublicKeys(array $options = []): mixed
    {
        return $this->getPublicKeysAsync($options)->wait();
    }

    public function getPublicKeysAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_public_keys', $options);
    }
}
