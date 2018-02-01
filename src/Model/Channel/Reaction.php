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
 * Reaction Model
 */
class Reaction {

	/**
	 * times this emoji has been used to react
	 *
	 * @var int
	 */
	public $count;

	/**
	 * emoji information
	 *
	 * @var array
	 */
	public $emoji;

	/**
	 * whether the current user reacted using this emoji
	 *
	 * @var bool
	 */
	public $me = false;

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