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

namespace RestCord\Model\User;

/**
 * Connection Model
 */
class Connection {

	/**
	 * access tokens of users that have granted your app the gdm.join scope
	 * 
	 * @var array
	 */
	public $Access_tokens;

	/**
	 * get guilds after this guild ID
	 * 
	 * @var int
	 */
	public $After;

	/**
	 * if passed, modifies the user's avatar
	 * 
	 * @var avatar data
	 */
	public $Avatar;

	/**
	 * get guilds before this guild ID
	 * 
	 * @var int
	 */
	public $Before;

	/**
	 * id of the connection account
	 * 
	 * @var string
	 */
	public $Id;

	/**
	 * an array of partial server integrations
	 * 
	 * @var array
	 */
	public $Integrations;

	/**
	 * max number of guilds to return (1-100)
	 * 
	 * @var int
	 */
	public $Limit = 100;

	/**
	 * the username of the connection account
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * a dictionary of user ids to their respective nicknames
	 * 
	 * @var dict
	 */
	public $Nicks;

	/**
	 * the recipient to open a DM channel with
	 * 
	 * @var int
	 */
	public $Recipient_id;

	/**
	 * whether the connection is revoked
	 * 
	 * @var bool
	 */
	public $Revoked = false;

	/**
	 * the service of the connection (twitch, youtube)
	 * 
	 * @var string
	 */
	public $Type;

	/**
	 * users username, if changed may cause the users discriminator to be randomized.
	 * 
	 * @var string
	 */
	public $Username;

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