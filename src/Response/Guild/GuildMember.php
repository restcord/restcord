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
 * GuildMember Response class
 */
class GuildMember {

	/**
	 * @var bool If the user is deafened
	 */
	public $deaf;

	/**
	 * @var \DateTime Date the user joined the guild
	 */
	public $joined_at;

	/**
	 * @var bool If the user is muted
	 */
	public $mute;

	/**
	 * @var string|null This users guild nickname (if one is set)
	 */
	public $nick;

	/**
	 * @var array Array of role object id's
	 */
	public $roles;

	/**
	 * @var array User object
	 */
	public $user;
}