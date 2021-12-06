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

namespace RestCord\Model\User;

use RestCord\Traits\AvatarTrait;

/**
 * User Model
 */
class User {

	use AvatarTrait;

	/**
	 * the user's banner color encoded as an integer representation of hexadecimal color code
	 *
	 * @var int
	 */
	public $accent_color;

	/**
	 * the user's avatar hash
	 *
	 * @var string
	 */
	public $avatar;

	/**
	 * the user's banner hash
	 *
	 * @var string
	 */
	public $banner;

	/**
	 * whether the user belongs to an OAuth2 application
	 *
	 * @var bool
	 */
	public $bot = false;

	/**
	 * the user's 4-digit discord-tag
	 *
	 * @var string
	 */
	public $discriminator;

	/**
	 * the user's email
	 *
	 * @var string
	 */
	public $email;

	/**
	 * the flags on a user's account
	 *
	 * @var int
	 */
	public $flags;

	/**
	 * the user's id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the user's chosen language option
	 *
	 * @var string
	 */
	public $locale;

	/**
	 * whether the user has two factor enabled on their account
	 *
	 * @var bool
	 */
	public $mfa_enabled = false;

	/**
	 * the type of Nitro subscription on a user's account
	 *
	 * @var int
	 */
	public $premium_type;

	/**
	 * the public flags on a user's account
	 *
	 * @var int
	 */
	public $public_flags;

	/**
	 * whether the user is an Official Discord System user (part of the urgent message system)
	 *
	 * @var bool
	 */
	public $system = false;

	/**
	 * the user's username, not unique across the platform
	 *
	 * @var string
	 */
	public $username;

	/**
	 * whether the email on this account has been verified
	 *
	 * @var bool
	 */
	public $verified = false;

	/**
	 * @param array $content
	 */
	public function __construct(array $content = null) {
		if (null === $content) {
		    return;
		}
		                    
		foreach ($content as $key => $value) {
		    $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
		    if (property_exists($this, $key)) {
		        $this->{$key} = $value;
		    }
		}
	}
}