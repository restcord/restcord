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

namespace RestCord\Model\Guild;

/**
 * GuildMember Model
 */
class GuildMember {

	/**
	 * if the user is deafened
	 *
	 * @var bool
	 */
	public $deaf = false;

	/**
	 * when the user joined the guild
	 *
	 * @var int
	 */
	public $joined_at;

	/**
	 * if the user is muted
	 *
	 * @var bool
	 */
	public $mute = false;

	/**
	 * this users guild nickname (if one is set)
	 *
	 * @var string|null
	 */
	public $nick;

	/**
	 * array of role object ids
	 *
	 * @var int[]
	 */
	public $roles;

	/**
	 * user object
	 *
	 * @var \RestCord\Model\User\User
	 */
	public $user;

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