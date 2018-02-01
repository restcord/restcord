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

namespace RestCord\Model\Guild;

/**
 * Integration Model
 */
class Integration {

	/**
	 * integration account information
	 * 
	 * @var array
	 */
	public $Account;

	/**
	 * is this integration enabled
	 * 
	 * @var bool
	 */
	public $Enabled = false;

	/**
	 * the behavior of expiring subscribers
	 * 
	 * @var int
	 */
	public $Expire_behavior;

	/**
	 * the grace period before expiring subscribers
	 * 
	 * @var int
	 */
	public $Expire_grace_period;

	/**
	 * integration id
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * integration name
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * id that this integration uses for "subscribers"
	 * 
	 * @var int
	 */
	public $Role_id;

	/**
	 * when this integration was last synced
	 * 
	 * @var ISO8601 timestamp
	 */
	public $Synced_at;

	/**
	 * is this integration syncing
	 * 
	 * @var bool
	 */
	public $Syncing = false;

	/**
	 * integration type (twitch, youtube, etc)
	 * 
	 * @var string
	 */
	public $Type;

	/**
	 * user for this integration
	 * 
	 * @var array
	 */
	public $User;

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