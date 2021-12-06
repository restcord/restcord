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
 * User Intellisense Helper
 */
interface User {

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#create-dm
	 *
	 * @param array $options ['recipient_id' => 'snowflake']
	 * @return array
	 */
	public function createDm(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#create-group-dm
	 *
	 * @param array $options ['access_tokens' => 'array', 'nicks' => 'dict']
	 * @return array
	 */
	public function createGroupDm(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#get-current-user
	 *
	 * @param array $options []
	 * @return array
	 */
	public function getCurrentUser(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#get-current-user-guilds
	 *
	 * @param array $options ['before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
	 * @return array
	 */
	public function getCurrentUserGuilds(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#get-user
	 *
	 * @param array $options ['user.id' => 'snowflake']
	 * @return array
	 */
	public function getUser(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#get-user-connections
	 *
	 * @param array $options []
	 * @return array
	 */
	public function getUserConnections(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#leave-guild
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function leaveGuild(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/user#modify-current-user
	 *
	 * @param array $options ['username' => 'string', 'avatar' => 'image data']
	 * @return array
	 */
	public function modifyCurrentUser(array $options);
}