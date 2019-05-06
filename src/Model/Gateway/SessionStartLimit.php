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
 * SessionStartLimit Model
 */
class SessionStartLimit {

	/**
	 * The remaining number of session starts the current user is allowed
	 *
	 * @var int
	 */
	public $remaining;

	/**
	 * The number of milliseconds after which the limit resets
	 *
	 * @var int
	 */
	public $reset_after;

	/**
	 * The total number of session starts the current user is allowed
	 *
	 * @var int
	 */
	public $total;

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