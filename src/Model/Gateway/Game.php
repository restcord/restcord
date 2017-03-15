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

namespace RestCord\Model\Gateway;

/**
 * Game Model
 */
class Game {

	/**
	 * the game's name
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * see Game Types
	 * 
	 * @var int
	 */
	public $type;

	/**
	 * stream url, is validated when type is 1
	 * 
	 * @var string
	 */
	public $url;

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