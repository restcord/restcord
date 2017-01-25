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

namespace RestCord\Response\Guild;

/**
 * GuildEmbed Response class
 */
class GuildEmbed {

	/**
	 * @var int The embed channel id
	 */
	public $channel_id;

	/**
	 * @var bool If the embed is enabled
	 */
	public $enabled;
}