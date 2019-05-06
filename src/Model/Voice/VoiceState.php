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

namespace RestCord\Model\Voice;

/**
 * VoiceState Model
 */
class VoiceState {

	/**
	 * the channel id this user is connected to
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * whether this user is deafened by the server
	 *
	 * @var bool
	 */
	public $deaf = false;

	/**
	 * the guild id this voice state is for
	 *
	 * @var int|null
	 */
	public $guild_id;

	/**
	 * the guild member this voice state is for
	 *
	 * @var array|null
	 */
	public $member;

	/**
	 * whether this user is muted by the server
	 *
	 * @var bool
	 */
	public $mute = false;

	/**
	 * whether this user is locally deafened
	 *
	 * @var bool
	 */
	public $self_deaf = false;

	/**
	 * whether this user is locally muted
	 *
	 * @var bool
	 */
	public $self_mute = false;

	/**
	 * the session id for this voice state
	 *
	 * @var string
	 */
	public $session_id;

	/**
	 * whether this user is muted by the current user
	 *
	 * @var bool
	 */
	public $suppress = false;

	/**
	 * the user id this voice state is for
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