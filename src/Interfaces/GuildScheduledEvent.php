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
 * GuildScheduledEvent Intellisense Helper
 */
interface GuildScheduledEvent {

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#create-guild-scheduled-event
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'channel_id' => 'snowflake *', 'entity_metadata' => 'array', 'name' => 'string', 'privacy_level' => 'integer', 'scheduled_start_time' => 'string', 'scheduled_end_time' => 'string', 'description' => 'string', 'entity_type' => 'integer']
	 * @return array
	 */
	public function createGuildScheduledEvent(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#delete-guild-scheduled-event
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function deleteGuildScheduledEvent(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#get-guild-scheduled-event
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildScheduledEvent(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#get-guild-scheduled-event-users
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'limit' => 'number', 'with_member' => 'boolean', 'before' => 'snowflake', 'after' => 'snowflake']
	 * @return array
	 */
	public function getGuildScheduledEventUsers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#list-scheduled-events-for-guild
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'with_user_count' => 'boolean']
	 * @return array
	 */
	public function listScheduledEventsForGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-scheduled-event#modify-guild-scheduled-event
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'channel_id' => 'snowflake', 'entity_metadata' => 'array', 'name' => 'string', 'privacy_level' => 'integer', 'scheduled_start_time' => 'string', 'scheduled_end_time' => 'string', 'description' => 'string', 'entity_type' => 'integer', 'status' => 'integer']
	 * @return array
	 */
	public function modifyGuildScheduledEvent(array $options);
}