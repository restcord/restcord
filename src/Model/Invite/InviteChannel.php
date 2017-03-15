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

namespace RestCord\Model\Invite;

/**
 * InviteChannel Model
 */
class InviteChannel {

	/**
	 * id of the channel
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * name of the channel
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * 'text' or 'voice'
	 * 
	 * @var string
	 */
	public $type;

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