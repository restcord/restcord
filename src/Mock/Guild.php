<?php

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

namespace RestCord\Mock;

/**
 * Guild Intellisense Helper.
 */
interface Guild
{
    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'access_token' => 'string', 'nick' => 'string', 'roles' => 'array', 'mute' => 'bool', 'deaf' => 'bool']
     *
     * @return array Returns a 201 Created with the guild member as the body.
     */
    public function addGuildMember(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function addGuildMemberRole(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
     *
     * @return array Returns an object with one 'pruned' key indicating the number of members that were removed in the prune operation.
     */
    public function beginGuildPrune(array $options);

    /**
     * @param array $options ['name' => 'string', 'region' => 'string', 'icon' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'roles' => 'array', 'channels' => 'array']
     *
     * @return array Returns a guild object on success.
     */
    public function createGuild(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'delete-message-days' => 'integer']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function createGuildBan(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'type' => 'string', 'bitrate' => 'integer', 'user_limit' => 'integer', 'permission_overwrites' => 'array']
     *
     * @return array Returns the new channel object on success.
     */
    public function createGuildChannel(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'type' => 'string', 'id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function createGuildIntegration(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
     *
     * @return array Returns the new role object on success.
     */
    public function createGuildRole(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns the guild object on success.
     */
    public function deleteGuild(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteGuildIntegration(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteGuildRole(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns the new guild object for the given id.
     */
    public function getGuild(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of user objects that are banned from this guild.
     */
    public function getGuildBans(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of guild channel objects.
     */
    public function getGuildChannels(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns the guild embed object.
     */
    public function getGuildEmbed(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of integration objects for the guild.
     */
    public function getGuildIntegrations(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of invite objects (with invite metadata) for the guild.
     */
    public function getGuildInvites(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
     *
     * @return array Returns a guild member object for the specified user.
     */
    public function getGuildMember(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
     *
     * @return array Returns an object with one 'pruned' key indicating the number of members that would be removed in a prune operation.
     */
    public function getGuildPruneCount(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of role objects for the guild.
     */
    public function getGuildRoles(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of voice region objects for the guild.
     */
    public function getGuildVoiceRegions(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'limit' => 'integer', 'after' => 'integer']
     *
     * @return array Returns a list of guild member objects that are members of the guild.
     */
    public function listGuildMembers(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
     *
     * @return array Returns a 200 with the nickname on success.
     */
    public function modifyCurrentUsersNick(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'region' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'afk_channel_id' => 'snowflake', 'afk_timeout' => 'integer', 'icon' => 'string', 'owner_id' => 'snowflake', 'splash' => 'string']
     *
     * @return array Returns the updated guild object on success.
     */
    public function modifyGuild(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
     *
     * @return array Returns a list of all of the guild's channel objects on success.
     */
    public function modifyGuildChannelPositions(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns the updated guild embed object.
     */
    public function modifyGuildEmbed(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string', 'expire_behavior' => 'integer', 'expire_grace_period' => 'integer', 'enable_emoticons' => 'bool']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function modifyGuildIntegration(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'nick' => 'string', 'roles' => 'array', 'mute' => 'bool', 'deaf' => 'bool', 'channel_id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function modifyGuildMember(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
     *
     * @return array Returns the updated role on success.
     */
    public function modifyGuildRole(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
     *
     * @return array Returns a list of all of the guild's role objects on success.
     */
    public function modifyGuildRolePositions(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function removeGuildBan(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function removeGuildMember(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function removeGuildMemberRole(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function syncGuildIntegration(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
     *
     * @return array Returns the nick
     */
    public function updateNick(array $options);
}
