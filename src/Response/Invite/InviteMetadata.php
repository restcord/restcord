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
 * InviteMetadata Response class
 */
class InviteMetadata {

	/**
	 * @var \DateTime When this invite was created
	 */
	public $created_at;

	/**
	 * @var array User who created the invite
	 */
	public $inviter;

	/**
	 * @var int Duration (in seconds) after which the invite expires
	 */
	public $max_age;

	/**
	 * @var int Max number of times this invite can be used
	 */
	public $max_uses;

	/**
	 * @var bool Whether this invite is revoked
	 */
	public $revoked;

	/**
	 * @var bool Whether this invite only grants temporary membership
	 */
	public $temporary;

	/**
	 * @var int Number of times this invite has been used
	 */
	public $uses;
}