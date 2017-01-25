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

namespace RestCord\Response\Channel;

/**
 * GuildChannel Response class
 */
class GuildChannel {

	/**
	 * @var int The bitrate (in bits) of the voice channel
	 */
	public $bitrate;

	/**
	 * @var int The id of the guild
	 */
	public $guild_id;

	/**
	 * @var int The id of this channel (will be equal to the guild if it's the "general" channel)
	 */
	public $id;

	/**
	 * @var bool Should always be false for guild channels
	 */
	public $is_private;

	/**
	 * @var int The id of the last message sent in this channel
	 */
	public $last_message_id;

	/**
	 * @var string The name of the channel (2-100 characters)
	 */
	public $name;

	/**
	 * @var array An array of overwrite objects
	 */
	public $permission_overwrites;

	/**
	 * @var int Sorting position of the channel
	 */
	public $position;

	/**
	 * @var string The channel topic (0-1024 characters)
	 */
	public $topic;

	/**
	 * @var string "text" or "voice"
	 */
	public $type;

	/**
	 * @var int The user limit of the voice channel
	 */
	public $user_limit;
}