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

namespace RestCord\Model\AuditLog;

/**
 * AuditLogChange Model
 */
class AuditLogChange {

	/**
	 * the type of audit log event
	 *
	 * @var int
	 */
	public $action_type;

	/**
	 * filter the log before a certain entry id
	 *
	 * @var int
	 */
	public $before;

	/**
	 * how many entries are returned (default 50, minimum 1, maximum 100)
	 *
	 * @var int
	 */
	public $limit;

	/**
	 * filter the log for actions made by a user
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