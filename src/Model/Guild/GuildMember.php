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
	public $Deaf = false;

	/**
	 * when the user joined the guild
	 * 
	 * @var ISO8601 timestamp
	 */
	public $Joined_at;

	/**
	 * if the user is muted
	 * 
	 * @var bool
	 */
	public $Mute = false;

	/**
	 * this users guild nickname (if one is set)
	 * 
	 * @var string|null
	 */
	public $Nick;

	/**
	 * array of role object ids
	 * 
	 * @var array
	 */
	public $Roles;

	/**
	 * user object
	 * 
	 * @var array
	 */
	public $User;

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