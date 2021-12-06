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

namespace RestCord\Model\Emoji;

/**
 * Emoji Model
 */
class Emoji {

	/**
	 * whether this emoji is animated
	 *
	 * @var bool
	 */
	public $animated = false;

	/**
	 * whether this emoji can be used, may be false due to loss of Server Boosts
	 *
	 * @var bool
	 */
	public $available = false;

	/**
	 * emoji id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the 128x128 emoji image
	 *
	 * @var image data
	 */
	public $image;

	/**
	 * whether this emoji is managed
	 *
	 * @var bool
	 */
	public $managed = false;

	/**
	 * name of the emoji
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
	 * roles allowed to use this emoji
	 *
	 * @var array
	 */
	public $roles;

	/**
	 * user that created this emoji
	 *
	 * @var array
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