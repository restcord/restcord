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

/**
 * UserGuild Model
 */
class UserGuild {

	/**
	 * guild.icon
	 * 
	 * @var string
	 */
	public $icon;

	/**
	 * guild.id
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * guild.name
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * true if the user is an owner of the guild
	 * 
	 * @var bool
	 */
	public $owner = false;

	/**
	 * bitwise of the user's enabled/disabled permissions
	 * 
	 * @var int
	 */
	public $permissions;

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