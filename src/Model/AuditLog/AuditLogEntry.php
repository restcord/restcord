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
 * AuditLogEntry Model
 */
class AuditLogEntry {

	/**
	 * type of action that occured
	 *
	 * @var audit log event
	 */
	public $action_type;

	/**
	 * changes made to the target_id
	 *
	 * @var array|null
	 */
	public $changes;

	/**
	 * id of the entry
	 *
	 * @var int
	 */
	public $id;

	/**
	 * additional info for certain action types
	 *
	 * @var optional audit entry info|null
	 */
	public $options;

	/**
	 * the reason for the change (0-512 characters)
	 *
	 * @var string|null
	 */
	public $reason;

	/**
	 * id of the affected entity (webhook, user, role, etc.)
	 *
	 * @var string
	 */
	public $target_id;

	/**
	 * the user who made the changes
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