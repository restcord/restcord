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
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'access_token' => 'string', 'nick' => 'string', 'roles' => 'array', 'mute' => 'boolean', 'deaf' => 'boolean']
	 * @return array
	 */
	public function addGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#add-guild-member-role
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array
	 */
	public function addGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#begin-guild-prune
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer', 'compute_prune_count' => 'boolean', 'include_roles' => 'array', 'reason' => 'string']
	 * @return array
	 */
	public function beginGuildPrune(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild
	 *
	 * @param array $options ['name' => 'string', 'region' => 'string', 'icon' => 'image data', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'explicit_content_filter' => 'integer', 'roles' => 'array', 'channels' => 'array', 'afk_channel_id' => 'snowflake', 'afk_timeout' => 'integer', 'system_channel_id' => 'snowflake', 'system_channel_flags' => 'integer']
	 * @return array
	 */
	public function createGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-ban
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'delete_message_days' => 'integer', 'reason' => 'string']
	 * @return array
	 */
	public function createGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-channel
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'type' => 'integer', 'topic' => 'string', 'bitrate' => 'integer', 'user_limit' => 'integer', 'rate_limit_per_user' => 'integer', 'position' => 'integer', 'permission_overwrites' => 'array', 'parent_id' => 'snowflake', 'nsfw' => 'boolean']
	 * @return array
	 */
	public function createGuildChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#create-guild-role
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'permissions' => 'string', 'color' => 'integer', 'hoist' => 'boolean', 'icon' => 'image data', 'unicode_emoji' => 'string', 'mentionable' => 'boolean']
	 * @return array
	 */
	public function createGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function deleteGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-integration
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'integration.id' => 'string']
	 * @return array
	 */
	public function deleteGuildIntegration(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#delete-guild-role
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string']
	 * @return array
	 */
	public function deleteGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'with_counts' => 'boolean']
	 * @return array
	 */
	public function getGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-ban
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-bans
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildBans(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-channels
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildChannels(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-integrations
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildIntegrations(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-invites
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildInvites(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-member
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-preview
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildPreview(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-prune-count
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'days' => 'integer', 'include_roles' => 'array']
	 * @return array
	 */
	public function getGuildPruneCount(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-roles
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildRoles(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-vanity-url
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildVanityUrl(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-voice-regions
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildVoiceRegions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-welcome-screen
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildWelcomeScreen(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-widget
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildWidget(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-widget-image
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'style' => 'string']
	 * @return array
	 */
	public function getGuildWidgetImage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#get-guild-widget-settings
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildWidgetSettings(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#list-active-threads
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function listActiveThreads(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#list-guild-members
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'limit' => 'integer', 'after' => 'snowflake']
	 * @return array
	 */
	public function listGuildMembers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-current-member
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array
	 */
	public function modifyCurrentMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-current-user-nick
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array
	 */
	public function modifyCurrentUserNick(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-current-user-voice-state
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'channel_id' => 'snowflake', 'suppress' => 'boolean', 'request_to_speak_timestamp' => 'ISO8601 timestamp']
	 * @return array
	 */
	public function modifyCurrentUserVoiceState(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'region' => 'string', 'verification_level' => 'integer', 'default_message_notifications' => 'integer', 'explicit_content_filter' => 'integer', 'afk_channel_id' => 'snowflake', 'afk_timeout' => 'integer', 'icon' => 'image data', 'owner_id' => 'snowflake', 'splash' => 'image data', 'discovery_splash' => 'image data', 'banner' => 'image data', 'system_channel_id' => 'snowflake', 'system_channel_flags' => 'integer', 'rules_channel_id' => 'snowflake', 'public_updates_channel_id' => 'snowflake', 'preferred_locale' => 'string', 'features' => 'array', 'description' => 'string', 'premium_progress_bar_enabled' => 'boolean']
	 * @return array
	 */
	public function modifyGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-channel-positions
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer', 'lock_permissions' => 'boolean', 'parent_id' => 'snowflake']
	 * @return array
	 */
	public function modifyGuildChannelPositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-member
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'nick' => 'string', 'roles' => 'array', 'mute' => 'boolean', 'deaf' => 'boolean', 'channel_id' => 'snowflake']
	 * @return array
	 */
	public function modifyGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'role.id' => 'string', 'name' => 'string', 'permissions' => 'string', 'color' => 'integer', 'hoist' => 'boolean', 'icon' => 'image data', 'unicode_emoji' => 'string', 'mentionable' => 'boolean']
	 * @return array
	 */
	public function modifyGuildRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-role-positions
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'id' => 'snowflake', 'position' => 'integer']
	 * @return array
	 */
	public function modifyGuildRolePositions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-welcome-screen
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'enabled' => 'boolean', 'welcome_channels' => 'array', 'description' => 'string']
	 * @return array
	 */
	public function modifyGuildWelcomeScreen(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-guild-widget
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function modifyGuildWidget(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#modify-user-voice-state
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'channel_id' => 'snowflake', 'suppress' => 'boolean']
	 * @return array
	 */
	public function modifyUserVoiceState(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-ban
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function removeGuildBan(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function removeGuildMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#remove-guild-member-role
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user.id' => 'snowflake', 'role.id' => 'string']
	 * @return array
	 */
	public function removeGuildMemberRole(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild#search-guild-members
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'query' => 'string', 'limit' => 'integer']
	 * @return array
	 */
	public function searchGuildMembers(array $options);

	/**
	 * @param array $options ['guild.id' => 'snowflake', 'nick' => 'string']
	 * @return array Returns the nick
	 */
	public function updateNick(array $options);
}