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

final class ApplicationsApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function applicationsGetActivityInstance(array $options = []): mixed
    {
        return $this->applicationsGetActivityInstanceAsync($options)->wait();
    }

    public function applicationsGetActivityInstanceAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('applications_get_activity_instance', $options);
    }

    public function bulkSetApplicationCommands(array $options = []): mixed
    {
        return $this->bulkSetApplicationCommandsAsync($options)->wait();
    }

    public function bulkSetApplicationCommandsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_set_application_commands', $options);
    }

    public function bulkSetGuildApplicationCommands(array $options = []): mixed
    {
        return $this->bulkSetGuildApplicationCommandsAsync($options)->wait();
    }

    public function bulkSetGuildApplicationCommandsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_set_guild_application_commands', $options);
    }

    public function consumeEntitlement(array $options = []): mixed
    {
        return $this->consumeEntitlementAsync($options)->wait();
    }

    public function consumeEntitlementAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('consume_entitlement', $options);
    }

    public function createApplicationCommand(array $options = []): mixed
    {
        return $this->createApplicationCommandAsync($options)->wait();
    }

    public function createApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_application_command', $options);
    }

    public function createApplicationEmoji(array $options = []): mixed
    {
        return $this->createApplicationEmojiAsync($options)->wait();
    }

    public function createApplicationEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_application_emoji', $options);
    }

    public function createEntitlement(array $options = []): mixed
    {
        return $this->createEntitlementAsync($options)->wait();
    }

    public function createEntitlementAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_entitlement', $options);
    }

    public function createGuildApplicationCommand(array $options = []): mixed
    {
        return $this->createGuildApplicationCommandAsync($options)->wait();
    }

    public function createGuildApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_application_command', $options);
    }

    public function deleteApplicationCommand(array $options = []): mixed
    {
        return $this->deleteApplicationCommandAsync($options)->wait();
    }

    public function deleteApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_application_command', $options);
    }

    public function deleteApplicationEmoji(array $options = []): mixed
    {
        return $this->deleteApplicationEmojiAsync($options)->wait();
    }

    public function deleteApplicationEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_application_emoji', $options);
    }

    public function deleteEntitlement(array $options = []): mixed
    {
        return $this->deleteEntitlementAsync($options)->wait();
    }

    public function deleteEntitlementAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_entitlement', $options);
    }

    public function deleteGuildApplicationCommand(array $options = []): mixed
    {
        return $this->deleteGuildApplicationCommandAsync($options)->wait();
    }

    public function deleteGuildApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_application_command', $options);
    }

    public function getApplication(array $options = []): mixed
    {
        return $this->getApplicationAsync($options)->wait();
    }

    public function getApplicationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_application', $options);
    }

    public function getApplicationCommand(array $options = []): mixed
    {
        return $this->getApplicationCommandAsync($options)->wait();
    }

    public function getApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_application_command', $options);
    }

    public function getApplicationEmoji(array $options = []): mixed
    {
        return $this->getApplicationEmojiAsync($options)->wait();
    }

    public function getApplicationEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_application_emoji', $options);
    }

    public function getApplicationRoleConnectionsMetadata(array $options = []): mixed
    {
        return $this->getApplicationRoleConnectionsMetadataAsync($options)->wait();
    }

    public function getApplicationRoleConnectionsMetadataAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_application_role_connections_metadata', $options);
    }

    public function getEntitlement(array $options = []): mixed
    {
        return $this->getEntitlementAsync($options)->wait();
    }

    public function getEntitlementAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_entitlement', $options);
    }

    public function getEntitlements(array $options = []): mixed
    {
        return $this->getEntitlementsAsync($options)->wait();
    }

    public function getEntitlementsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_entitlements', $options);
    }

    public function getGuildApplicationCommand(array $options = []): mixed
    {
        return $this->getGuildApplicationCommandAsync($options)->wait();
    }

    public function getGuildApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_application_command', $options);
    }

    public function getGuildApplicationCommandPermissions(array $options = []): mixed
    {
        return $this->getGuildApplicationCommandPermissionsAsync($options)->wait();
    }

    public function getGuildApplicationCommandPermissionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_application_command_permissions', $options);
    }

    public function getMyApplication(array $options = []): mixed
    {
        return $this->getMyApplicationAsync($options)->wait();
    }

    public function getMyApplicationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_my_application', $options);
    }

    public function listApplicationCommands(array $options = []): mixed
    {
        return $this->listApplicationCommandsAsync($options)->wait();
    }

    public function listApplicationCommandsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_application_commands', $options);
    }

    public function listApplicationEmojis(array $options = []): mixed
    {
        return $this->listApplicationEmojisAsync($options)->wait();
    }

    public function listApplicationEmojisAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_application_emojis', $options);
    }

    public function listGuildApplicationCommandPermissions(array $options = []): mixed
    {
        return $this->listGuildApplicationCommandPermissionsAsync($options)->wait();
    }

    public function listGuildApplicationCommandPermissionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_application_command_permissions', $options);
    }

    public function listGuildApplicationCommands(array $options = []): mixed
    {
        return $this->listGuildApplicationCommandsAsync($options)->wait();
    }

    public function listGuildApplicationCommandsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_application_commands', $options);
    }

    public function setGuildApplicationCommandPermissions(array $options = []): mixed
    {
        return $this->setGuildApplicationCommandPermissionsAsync($options)->wait();
    }

    public function setGuildApplicationCommandPermissionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('set_guild_application_command_permissions', $options);
    }

    public function updateApplication(array $options = []): mixed
    {
        return $this->updateApplicationAsync($options)->wait();
    }

    public function updateApplicationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_application', $options);
    }

    public function updateApplicationCommand(array $options = []): mixed
    {
        return $this->updateApplicationCommandAsync($options)->wait();
    }

    public function updateApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_application_command', $options);
    }

    public function updateApplicationEmoji(array $options = []): mixed
    {
        return $this->updateApplicationEmojiAsync($options)->wait();
    }

    public function updateApplicationEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_application_emoji', $options);
    }

    public function updateApplicationRoleConnectionsMetadata(array $options = []): mixed
    {
        return $this->updateApplicationRoleConnectionsMetadataAsync($options)->wait();
    }

    public function updateApplicationRoleConnectionsMetadataAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_application_role_connections_metadata', $options);
    }

    public function updateGuildApplicationCommand(array $options = []): mixed
    {
        return $this->updateGuildApplicationCommandAsync($options)->wait();
    }

    public function updateGuildApplicationCommandAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_application_command', $options);
    }

    public function updateMyApplication(array $options = []): mixed
    {
        return $this->updateMyApplicationAsync($options)->wait();
    }

    public function updateMyApplicationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_my_application', $options);
    }

    public function uploadApplicationAttachment(array $options = []): mixed
    {
        return $this->uploadApplicationAttachmentAsync($options)->wait();
    }

    public function uploadApplicationAttachmentAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('upload_application_attachment', $options);
    }
}
