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
 * ThreadMember Model
 */
class ThreadMember {

	/**
	 * any user-thread settings, currently only used for notifications
	 *
	 * @var int
	 */
	public $flags;

	/**
	 * the id of the thread
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the time the current user last joined the thread
	 *
	 * @var \DateTimeImmutable
	 */
	public $join_timestamp;

	/**
	 * the id of the user
	 *
	 * @var int
	 */
	public $user_id;

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