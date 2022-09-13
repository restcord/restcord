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
 * Emoji Intellisense Helper
 */
interface Emoji {

	/**
	 * @see https://discordapp.com/developers/docs/resources/emoji#create-guild-emoji
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'image' => 'image data', 'roles' => 'array']
	 * @return array
	 */
	public function createGuildEmoji(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/emoji#delete-guild-emoji
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'emoji.id' => 'string']
	 * @return array
	 */
	public function deleteGuildEmoji(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/emoji#get-guild-emoji
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'emoji.id' => 'string']
	 * @return array
	 */
	public function getGuildEmoji(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/emoji#list-guild-emojis
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function listGuildEmojis(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/emoji#modify-guild-emoji
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'emoji.id' => 'string', 'name' => 'string', 'roles' => 'array']
	 * @return array
	 */
	public function modifyGuildEmoji(array $options);
}