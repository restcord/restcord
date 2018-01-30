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

namespace RestCord\Interfaces;

use RestCord\Model\Guild\Emoji;

/**
 * Guild Intellisense Helper
 */
interface Guild {

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#add-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'access_token' => 'string', 'nick' => 'string', 'roles' => 'array', 'mute' => 'bool', 'deaf' => 'bool']
	 * @return \RestCord\Model\Guild\GuildMember Returns a 201 Created with the guild member as the body.
	 */
	public function addGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#add-guild-member-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function addGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#begin-guild-prune
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
	 * @return array Returns an object with one 'pruned' key indicating the number of members that were removed in the prune operation.
	 */
	public function beginGuildPrune(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild
	 * 
	 * @param array $options ['name' => 'string', 'region' => 'string', 'icon' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'roles' => 'array', 'channels' => 'array']
	 * @return \RestCord\Model\Guild\Guild Returns a guild object on success.
	 */
	public function createGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-ban
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'delete-message-days' => 'integer']
	 * @return array Returns a 204 empty response on success.
	 */
	public function createGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-channel
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'type' => 'string', 'bitrate' => 'integer', 'user_limit' => 'integer', 'permission_overwrites' => 'array']
	 * @return \RestCord\Model\Channel\GuildChannel Returns the new channel object on success.
	 */
	public function createGuildChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'type' => 'string', 'id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function createGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
	 * @return \RestCord\Model\Guild\Role Returns the new role object on success.
	 */
	public function createGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Guild Returns the guild object on success.
	 */
	public function deleteGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Guild Returns the new guild object for the given id.
	 */
	public function getGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-bans
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\User\User[] Returns a list of user objects that are banned from this guild.
	 */
	public function getGuildBans(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-channels
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Channel\GuildChannel[] Returns a list of guild channel objects.
	 */
	public function getGuildChannels(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-embed
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildEmbed Returns the guild embed object.
	 */
	public function getGuildEmbed(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-integrations
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Integration[] Returns a list of integration objects for the guild.
	 */
	public function getGuildIntegrations(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-invites
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Invite\Invite[] Returns a list of invite objects (with invite metadata) for the guild.
	 */
	public function getGuildInvites(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildMember Returns a guild member object for the specified user.
	 */
	public function getGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-prune-count
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
	 * @return array Returns an object with one 'pruned' key indicating the number of members that would be removed in a prune operation.
	 */
	public function getGuildPruneCount(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-roles
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Role[] Returns a list of role objects for the guild.
	 */
	public function getGuildRoles(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-voice-regions
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \GuzzleHttp\Command\Result[] Returns a list of voice region objects for the guild.
	 */
	public function getGuildVoiceRegions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#list-guild-members
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'limit' => 'integer', 'after' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildMember[] Returns a list of guild member objects that are members of the guild.
	 */
	public function listGuildMembers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-current-user's-nick
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array Returns a 200 with the nickname on success.
	 */
	public function modifyCurrentUsersNick(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'region' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'afk_channel_id' => 'snowflake', 'afk_timeout' => 'integer', 'icon' => 'string', 'owner_id' => 'snowflake', 'splash' => 'string']
	 * @return \RestCord\Model\Guild\Guild Returns the updated guild object on success.
	 */
	public function modifyGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-channel-positions
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
	 * @return \RestCord\Model\Channel\GuildChannel[] Returns a list of all of the guild's channel objects on success.
	 */
	public function modifyGuildChannelPositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-embed
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildEmbed Returns the updated guild embed object.
	 */
	public function modifyGuildEmbed(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string', 'expire_behavior' => 'guild/integration-object', 'expire_grace_period' => 'integer', 'enable_emoticons' => 'bool']
	 * @return array Returns a 204 empty response on success.
	 */
	public function modifyGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'nick' => 'string', 'roles' => 'array', 'mute' => 'bool', 'deaf' => 'bool', 'channel_id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function modifyGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
	 * @return \RestCord\Model\Guild\Role Returns the updated role on success.
	 */
	public function modifyGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role-positions
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
	 * @return \RestCord\Model\Guild\Role[] Returns a list of all of the guild's role objects on success.
	 */
	public function modifyGuildRolePositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-ban
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function removeGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function removeGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function removeGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#sync-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function syncGuildIntegration(array $options);

	/**
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array Returns the nick
	 */
	public function updateNick(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     * @return array Returns a list of emoji objects for the given guild.
     */
    public function listGuildEmoji(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'emoji.id' => 'snowflake']
     * @return Emoji Returns an emoji object for the given guild and emoji IDs.
     */
    public function getGuildEmoji(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'image' => 'string', 'roles' => 'array']
     * @return Emoji Returns the new emoji object on success
     */
    public function createGuildEmoji(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake','emoji.name' => 'string', 'emoji.id' => 'snowflake', 'emoji.roles' => 'array']
     * @return Emoji Returns the updated emoji object on success
     */
    public function modifyGuildEmoji(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake', 'emoji.id' => 'snowflake']
     * @return array Returns a 204 empty response on success.id
     */
    public function deleteGuildEmoji(array $options);
}
