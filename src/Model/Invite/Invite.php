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
 * Invite Model
 */
class Invite {

	/**
	 * approximate count of total members, returned from the GET /invites/<code> endpoint when with_counts is true
	 *
	 * @var int
	 */
	public $approximate_member_count;

	/**
	 * approximate count of online members, returned from the GET /invites/<code> endpoint when with_counts is true
	 *
	 * @var int
	 */
	public $approximate_presence_count;

	/**
	 * the channel this invite is for
	 *
	 * @var array
	 */
	public $channel;

	/**
	 * the invite code (unique ID)
	 *
	 * @var string
	 */
	public $code;

	/**
	 * the expiration date of this invite, returned from the GET /invites/<code> endpoint when with_expiration is true
	 *
	 * @var \DateTimeImmutable
	 */
	public $expires_at;

	/**
	 * the guild this invite is for
	 *
	 * @var array
	 */
	public $guild;

	/**
	 * guild scheduled event data, only included if guild_scheduled_event_id contains a valid guild scheduled event id
	 *
	 * @var array
	 */
	public $guild_scheduled_event;

	/**
	 * the user who created the invite
	 *
	 * @var array
	 */
	public $inviter;

	/**
	 * stage instance data if there is a public Stage instance in the Stage channel this invite is for
	 *
	 * @var array
	 */
	public $stage_instance;

	/**
	 * the embedded application to open for this voice channel embedded application invite
	 *
	 * @var array
	 */
	public $target_application;

	/**
	 * the type of target for this voice channel invite
	 *
	 * @var int
	 */
	public $target_type;

	/**
	 * the user whose stream to display for this voice channel stream invite
	 *
	 * @var array
	 */
	public $target_user;

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