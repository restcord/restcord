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

namespace RestCord\Model\Channel;

/**
 * AllowedMentions Model
 */
class AllowedMentions {

	/**
	 * An array of allowed mention types to parse from the content.
	 *
	 * @var array
	 */
	public $parse;

	/**
	 * For replies, whether to mention the author of the message being replied to (default false)
	 *
	 * @var bool
	 */
	public $replied_user = false;

	/**
	 * Array of role_ids to mention (Max size of 100)
	 *
	 * @var list of snowflakes
	 */
	public $roles;

	/**
	 * Array of user_ids to mention (Max size of 100)
	 *
	 * @var list of snowflakes
	 */
	public $users;

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