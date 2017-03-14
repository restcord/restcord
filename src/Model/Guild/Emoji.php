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
 * Emoji Model
 */
class Emoji {

	/**
	 * emoji id
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * whether this emoji is managed
	 * 
	 * @var bool
	 */
	public $managed = false;

	/**
	 * emoji name
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * whether this emoji must be wrapped in colons
	 * 
	 * @var bool
	 */
	public $require_colons = false;

	/**
	 * roles this emoji is active for
	 * 
	 * @var array
	 */
	public $roles;

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