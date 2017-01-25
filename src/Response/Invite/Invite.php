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

namespace RestCord\Response\Invite;

/**
 * Invite Response class
 */
class Invite {

	/**
	 * @var array The channel this invite is for
	 */
	public $channel;

	/**
	 * @var string The invite code (unique ID)
	 */
	public $code;

	/**
	 * @var array The guild this invite is for
	 */
	public $guild;
}