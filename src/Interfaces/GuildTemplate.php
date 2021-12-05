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
 * GuildTemplate Intellisense Helper
 */
interface GuildTemplate {

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#create-guild-from-guild-template
	 *
	 * @param array $options ['template.code' => 'string', 'name' => 'string', 'icon' => 'image data']
	 * @return array
	 */
	public function createGuildFromGuildTemplate(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#create-guild-template
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'description' => 'string']
	 * @return array
	 */
	public function createGuildTemplate(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#delete-guild-template
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'template.code' => 'string']
	 * @return array
	 */
	public function deleteGuildTemplate(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#get-guild-template
	 *
	 * @param array $options ['template.code' => 'string']
	 * @return array
	 */
	public function getGuildTemplate(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#get-guild-templates
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildTemplates(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#modify-guild-template
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'template.code' => 'string', 'name' => 'string', 'description' => 'string']
	 * @return array
	 */
	public function modifyGuildTemplate(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/guild-template#sync-guild-template
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'template.code' => 'string']
	 * @return array
	 */
	public function syncGuildTemplate(array $options);
}