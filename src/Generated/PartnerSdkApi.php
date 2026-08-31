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

final class PartnerSdkApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function botPartnerSdkToken(array $options = []): mixed
    {
        return $this->botPartnerSdkTokenAsync($options)->wait();
    }

    public function botPartnerSdkTokenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bot_partner_sdk_token', $options);
    }

    public function botPartnerSdkUnmergeProvisionalAccount(array $options = []): mixed
    {
        return $this->botPartnerSdkUnmergeProvisionalAccountAsync($options)->wait();
    }

    public function botPartnerSdkUnmergeProvisionalAccountAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bot_partner_sdk_unmerge_provisional_account', $options);
    }

    public function partnerSdkToken(array $options = []): mixed
    {
        return $this->partnerSdkTokenAsync($options)->wait();
    }

    public function partnerSdkTokenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('partner_sdk_token', $options);
    }

    public function partnerSdkUnmergeProvisionalAccount(array $options = []): mixed
    {
        return $this->partnerSdkUnmergeProvisionalAccountAsync($options)->wait();
    }

    public function partnerSdkUnmergeProvisionalAccountAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('partner_sdk_unmerge_provisional_account', $options);
    }

    public function updateUserMessageExternalModerationMetadata(array $options = []): mixed
    {
        return $this->updateUserMessageExternalModerationMetadataAsync($options)->wait();
    }

    public function updateUserMessageExternalModerationMetadataAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_user_message_external_moderation_metadata', $options);
    }
}
