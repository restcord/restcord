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
 * Sticker Intellisense Helper
 */
interface Sticker {

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#create-guild-sticker
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'name' => 'string', 'description' => 'string', 'tags' => 'string', 'file' => 'file contents']
	 * @return array
	 */
	public function createGuildSticker(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#delete-guild-sticker
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'sticker.id' => 'string']
	 * @return array
	 */
	public function deleteGuildSticker(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#get-guild-sticker
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'sticker.id' => 'string']
	 * @return array
	 */
	public function getGuildSticker(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#get-sticker
	 *
	 * @param array $options ['sticker.id' => 'string']
	 * @return array
	 */
	public function getSticker(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#list-guild-stickers
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function listGuildStickers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#list-nitro-sticker-packs
	 *
	 * @param array $options ['sticker_packs' => 'array']
	 * @return array
	 */
	public function listNitroStickerPacks(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/sticker#modify-guild-sticker
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'sticker.id' => 'string', 'name' => 'string', 'description' => 'string', 'tags' => 'string']
	 * @return array
	 */
	public function modifyGuildSticker(array $options);
}