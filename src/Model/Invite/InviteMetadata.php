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
 * InviteMetadata Model
 */
class InviteMetadata {

	/**
	 * when this invite was created
	 * 
	 * @var ISO8601 timestamp
	 */
	public $Created_at;

	/**
	 * user who created the invite
	 * 
	 * @var array
	 */
	public $Inviter;

	/**
	 * duration (in seconds) after which the invite expires
	 * 
	 * @var int
	 */
	public $Max_age;

	/**
	 * max number of times this invite can be used
	 * 
	 * @var int
	 */
	public $Max_uses;

	/**
	 * whether this invite is revoked
	 * 
	 * @var bool
	 */
	public $Revoked = false;

	/**
	 * whether this invite only grants temporary membership
	 * 
	 * @var bool
	 */
	public $Temporary = false;

	/**
	 * number of times this invite has been used
	 * 
	 * @var int
	 */
	public $Uses;

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