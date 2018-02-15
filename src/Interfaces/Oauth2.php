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
 * Oauth2 Intellisense Helper
 */
interface Oauth2 {

	/**
	 * @see https://discordapp.com/developers/docs/topics/oauth2#get-current-application-information
	 *
	 * @param array $options ['id' => 'snowflake', 'name' => 'string', 'icon?' => 'string', 'description?' => 'string', 'rpc_origins?' => 'array', 'bot_public' => 'bool', 'bot_require_code_grant' => 'bool', 'owner' => 'object']
	 * @return array Returns the bot's OAuth2 application info.
	 */
	public function getCurrentApplicationInformation(array $options);
}