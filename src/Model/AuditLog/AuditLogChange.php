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
	 * type of audit log change key
	 *
	 * @var string
	 */
	public $key;

	/**
	 * new value of the key
	 *
	 * @var mixed|null
	 */
	public $new_value;

	/**
	 * old value of the key
	 *
	 * @var mixed|null
	 */
	public $old_value;

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