<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class UsersApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function createDm(array $options = []): mixed
    {
        return $this->createDmAsync($options)->wait();
    }

    public function createDmAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_dm', $options);
    }

    public function deleteApplicationUserRoleConnection(array $options = []): mixed
    {
        return $this->deleteApplicationUserRoleConnectionAsync($options)->wait();
    }

    public function deleteApplicationUserRoleConnectionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_application_user_role_connection', $options);
    }

    public function getApplicationUserRoleConnection(array $options = []): mixed
    {
        return $this->getApplicationUserRoleConnectionAsync($options)->wait();
    }

    public function getApplicationUserRoleConnectionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_application_user_role_connection', $options);
    }

    public function getCurrentUserApplicationEntitlements(array $options = []): mixed
    {
        return $this->getCurrentUserApplicationEntitlementsAsync($options)->wait();
    }

    public function getCurrentUserApplicationEntitlementsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_current_user_application_entitlements', $options);
    }

    public function getMyGuildMember(array $options = []): mixed
    {
        return $this->getMyGuildMemberAsync($options)->wait();
    }

    public function getMyGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_my_guild_member', $options);
    }

    public function getMyUser(array $options = []): mixed
    {
        return $this->getMyUserAsync($options)->wait();
    }

    public function getMyUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_my_user', $options);
    }

    public function getUser(array $options = []): mixed
    {
        return $this->getUserAsync($options)->wait();
    }

    public function getUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_user', $options);
    }

    public function leaveGuild(array $options = []): mixed
    {
        return $this->leaveGuildAsync($options)->wait();
    }

    public function leaveGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('leave_guild', $options);
    }

    public function listMyConnections(array $options = []): mixed
    {
        return $this->listMyConnectionsAsync($options)->wait();
    }

    public function listMyConnectionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_my_connections', $options);
    }

    public function listMyGuilds(array $options = []): mixed
    {
        return $this->listMyGuildsAsync($options)->wait();
    }

    public function listMyGuildsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_my_guilds', $options);
    }

    public function updateApplicationUserRoleConnection(array $options = []): mixed
    {
        return $this->updateApplicationUserRoleConnectionAsync($options)->wait();
    }

    public function updateApplicationUserRoleConnectionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_application_user_role_connection', $options);
    }

    public function updateMyUser(array $options = []): mixed
    {
        return $this->updateMyUserAsync($options)->wait();
    }

    public function updateMyUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_my_user', $options);
    }
}
