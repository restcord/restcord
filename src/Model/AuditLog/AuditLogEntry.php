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
	public $Action_type;

	/**
	 * changes made to the target_id
	 * 
	 * @var array|null
	 */
	public $Changes;

	/**
	 * id of the entry
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * additional info for certain action types
	 * 
	 * @var optional audit entry info|null
	 */
	public $Options;

	/**
	 * the reason for the change
	 * 
	 * @var string|null
	 */
	public $Reason;

	/**
	 * id of the affected entity (webhook, user, role, etc.)
	 * 
	 * @var string
	 */
	public $Target_id;

	/**
	 * the user who made the changes
	 * 
	 * @var int
	 */
	public $User_id;

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