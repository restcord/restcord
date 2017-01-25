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
 * InviteChannel Response class
 */
class InviteChannel {

	/**
	 * @var int Id of the channel
	 */
	public $id;

	/**
	 * @var string Name of the channel
	 */
	public $name;

	/**
	 * @var string 'text' or 'voice'
	 */
	public $type;
}