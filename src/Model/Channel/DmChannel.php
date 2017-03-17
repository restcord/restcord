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
 * DmChannel Model
 */
class DmChannel {

	/**
	 * the id of this private message
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * should always be true for DM channels
	 * 
	 * @var bool
	 */
	public $is_private = false;

	/**
	 * the id of the last message sent in this DM
	 * 
	 * @var int
	 */
	public $last_message_id;

	/**
	 * the user object of the DM recipient
	 * 
	 * @var array
	 */
	public $recipient;

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