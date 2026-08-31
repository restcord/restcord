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

final class InvitesApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function getInviteTargetUsers(array $options = []): mixed
    {
        return $this->getInviteTargetUsersAsync($options)->wait();
    }

    public function getInviteTargetUsersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_invite_target_users', $options);
    }

    public function getInviteTargetUsersJobStatus(array $options = []): mixed
    {
        return $this->getInviteTargetUsersJobStatusAsync($options)->wait();
    }

    public function getInviteTargetUsersJobStatusAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_invite_target_users_job_status', $options);
    }

    public function inviteResolve(array $options = []): mixed
    {
        return $this->inviteResolveAsync($options)->wait();
    }

    public function inviteResolveAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('invite_resolve', $options);
    }

    public function inviteRevoke(array $options = []): mixed
    {
        return $this->inviteRevokeAsync($options)->wait();
    }

    public function inviteRevokeAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('invite_revoke', $options);
    }

    public function updateInviteTargetUsers(array $options = []): mixed
    {
        return $this->updateInviteTargetUsersAsync($options)->wait();
    }

    public function updateInviteTargetUsersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_invite_target_users', $options);
    }
}
