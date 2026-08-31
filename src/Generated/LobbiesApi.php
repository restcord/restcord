<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class LobbiesApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function addLobbyMember(array $options = []): mixed
    {
        return $this->addLobbyMemberAsync($options)->wait();
    }

    public function addLobbyMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_lobby_member', $options);
    }

    public function bulkUpdateLobbyMembers(array $options = []): mixed
    {
        return $this->bulkUpdateLobbyMembersAsync($options)->wait();
    }

    public function bulkUpdateLobbyMembersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_update_lobby_members', $options);
    }

    public function createLinkedLobbyGuildInviteForSelf(array $options = []): mixed
    {
        return $this->createLinkedLobbyGuildInviteForSelfAsync($options)->wait();
    }

    public function createLinkedLobbyGuildInviteForSelfAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_linked_lobby_guild_invite_for_self', $options);
    }

    public function createLinkedLobbyGuildInviteForUser(array $options = []): mixed
    {
        return $this->createLinkedLobbyGuildInviteForUserAsync($options)->wait();
    }

    public function createLinkedLobbyGuildInviteForUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_linked_lobby_guild_invite_for_user', $options);
    }

    public function createLobby(array $options = []): mixed
    {
        return $this->createLobbyAsync($options)->wait();
    }

    public function createLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_lobby', $options);
    }

    public function createLobbyMessage(array $options = []): mixed
    {
        return $this->createLobbyMessageAsync($options)->wait();
    }

    public function createLobbyMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_lobby_message', $options);
    }

    public function createOrJoinLobby(array $options = []): mixed
    {
        return $this->createOrJoinLobbyAsync($options)->wait();
    }

    public function createOrJoinLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_or_join_lobby', $options);
    }

    public function deleteLobby(array $options = []): mixed
    {
        return $this->deleteLobbyAsync($options)->wait();
    }

    public function deleteLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_lobby', $options);
    }

    public function deleteLobbyMember(array $options = []): mixed
    {
        return $this->deleteLobbyMemberAsync($options)->wait();
    }

    public function deleteLobbyMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_lobby_member', $options);
    }

    public function editLobby(array $options = []): mixed
    {
        return $this->editLobbyAsync($options)->wait();
    }

    public function editLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('edit_lobby', $options);
    }

    public function editLobbyChannelLink(array $options = []): mixed
    {
        return $this->editLobbyChannelLinkAsync($options)->wait();
    }

    public function editLobbyChannelLinkAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('edit_lobby_channel_link', $options);
    }

    public function getLobby(array $options = []): mixed
    {
        return $this->getLobbyAsync($options)->wait();
    }

    public function getLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_lobby', $options);
    }

    public function getLobbyMessages(array $options = []): mixed
    {
        return $this->getLobbyMessagesAsync($options)->wait();
    }

    public function getLobbyMessagesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_lobby_messages', $options);
    }

    public function leaveLobby(array $options = []): mixed
    {
        return $this->leaveLobbyAsync($options)->wait();
    }

    public function leaveLobbyAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('leave_lobby', $options);
    }

    public function updateLobbyMessageExternalModerationMetadata(array $options = []): mixed
    {
        return $this->updateLobbyMessageExternalModerationMetadataAsync($options)->wait();
    }

    public function updateLobbyMessageExternalModerationMetadataAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_lobby_message_external_moderation_metadata', $options);
    }
}
