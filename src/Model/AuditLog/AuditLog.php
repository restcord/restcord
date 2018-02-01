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
 * AuditLog Model
 */
class AuditLog {

	/**
	 * list of audit log entires
	 *
	 * @var array
	 */
	public $audit_log_entries;

	/**
	 * list of users found in the audit log
	 *
	 * @var array
	 */
	public $users;

	/**
	 * list of webhooks found in the audit log
	 *
	 * @var array
	 */
	public $webhooks;

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