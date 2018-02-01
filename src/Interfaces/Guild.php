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
	public function AddGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#add-guild-member-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function AddGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#begin-guild-prune
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
	 * @return array Returns an object with one 'pruned' key indicating the number of members that were removed in the prune operation.
	 */
	public function BeginGuildPrune(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild
	 * 
	 * @param array $options ['name' => 'string', 'region' => 'string', 'icon' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'explicit_content_filter' => 'integer', 'roles' => 'array', 'channels' => 'array']
	 * @return \RestCord\Model\Guild\Guild Returns a guild object on success.
	 */
	public function CreateGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-ban
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'delete-message-days' => 'integer', 'reason' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function CreateGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-channel
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'type' => 'integer', 'bitrate' => 'integer', 'user_limit' => 'integer', 'permission_overwrites' => 'array', 'parent_id' => 'snowflake', 'nsfw' => 'bool']
	 * @return \RestCord\Model\Channel\Channel Returns the new channel object on success.
	 */
	public function CreateGuildChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'type' => 'string', 'id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function CreateGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
	 * @return \RestCord\Model\Permissions\Role Returns the new role object on success.
	 */
	public function CreateGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array Returns 204 No Content on success.
	 */
	public function DeleteGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function DeleteGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function DeleteGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Guild Returns the guild object for the given id.
	 */
	public function GetGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-bans
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Ban[] Returns a list of ban objects for the users banned from this guild.
	 */
	public function GetGuildBans(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-channels
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Channel\Channel[] Returns a list of guild channel objects.
	 */
	public function GetGuildChannels(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-embed
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildEmbed Returns the guild embed object.
	 */
	public function GetGuildEmbed(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-integrations
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Integration[] Returns a list of integration objects for the guild.
	 */
	public function GetGuildIntegrations(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-invites
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Invite\Invite[] Returns a list of invite objects (with invite metadata) for the guild.
	 */
	public function GetGuildInvites(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildMember Returns a guild member object for the specified user.
	 */
	public function GetGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-prune-count
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer']
	 * @return array Returns an object with one 'pruned' key indicating the number of members that would be removed in a prune operation.
	 */
	public function GetGuildPruneCount(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-roles
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Permissions\Role[] Returns a list of role objects for the guild.
	 */
	public function GetGuildRoles(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-voice-regions
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \GuzzleHttp\Command\Result[] Returns a list of voice region objects for the guild.
	 */
	public function GetGuildVoiceRegions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#list-guild-members
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'limit' => 'integer', 'after' => 'snowflake']
	 * @return \GuzzleHttp\Command\Result[] Returns a list of guild member objects that are members of the guild.
	 */
	public function ListGuildMembers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-current-user's-nick
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array Returns a 200 with the nickname on success.
	 */
	public function ModifyCurrentUsersNick(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'region' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'explicit_content_filter' => 'integer', 'afk_channel_id' => 'snowflake', 'afk_timeout' => 'integer', 'icon' => 'string', 'owner_id' => 'snowflake', 'splash' => 'string', 'system_channel_id' => 'snowflake']
	 * @return \RestCord\Model\Guild\Guild Returns the updated guild object on success.
	 */
	public function ModifyGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-channel-positions
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
	 * @return array Returns a 204 empty response on success.
	 */
	public function ModifyGuildChannelPositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-embed
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Guild\GuildEmbed Returns the updated guild embed object.
	 */
	public function ModifyGuildEmbed(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string', 'expire_behavior' => 'integer', 'expire_grace_period' => 'integer', 'enable_emoticons' => 'bool']
	 * @return array Returns a 204 empty response on success.
	 */
	public function ModifyGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'nick' => 'string', 'roles' => 'array', 'mute' => 'bool', 'deaf' => 'bool', 'channel_id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function ModifyGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string', 'name' => 'string', 'permissions' => 'integer', 'color' => 'integer', 'hoist' => 'bool', 'mentionable' => 'bool']
	 * @return \RestCord\Model\Permissions\Role Returns the updated role on success.
	 */
	public function ModifyGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role-positions
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
	 * @return \RestCord\Model\Permissions\Role[] Returns a list of all of the guild's role objects on success.
	 */
	public function ModifyGuildRolePositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-ban
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function RemoveGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function RemoveGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member-role
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function RemoveGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#sync-guild-integration
	 * 
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function SyncGuildIntegration(array $options);

	/**
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array Returns the nick
	 */
	public function UpdateNick(array $options);
}