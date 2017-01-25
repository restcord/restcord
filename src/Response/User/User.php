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

namespace RestCord\Response\User;

/**
 * User Response class
 */
class User {

	/**
	 * @var string The user's avatar hash
	 */
	public $avatar;

	/**
	 * @var bool Whether the user belongs to an OAuth2 application
	 */
	public $bot;

	/**
	 * @var string The user's 4-digit discord-tag
	 */
	public $discriminator;

	/**
	 * @var string The user's email
	 */
	public $email;

	/**
	 * @var int The user's id
	 */
	public $id;

	/**
	 * @var bool Whether the user has two factor enabled on their account
	 */
	public $mfa_enabled;

	/**
	 * @var string The user's username, not unique across the platform
	 */
	public $username;

	/**
	 * @var bool Whether the email on this account has been verified
	 */
	public $verified;
}