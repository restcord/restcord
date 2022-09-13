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

namespace RestCord\Model\GuildScheduledEvent;

/**
 * GuildScheduledEventUser Model
 */
class GuildScheduledEventUser {

	/**
	 * consider only users after given user id
	 *
	 * @var int
	 */
	public $after;

	/**
	 * consider only users before given user id
	 *
	 * @var int
	 */
	public $before;

	/**
	 * the channel id of the scheduled event, set to null if changing entity type to EXTERNAL
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * the description of the scheduled event
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the entity metadata of the scheduled event
	 *
	 * @var array
	 */
	public $entity_metadata;

	/**
	 * the entity type of the scheduled event
	 *
	 * @var int
	 */
	public $entity_type;

	/**
	 * the scheduled event id which the user subscribed to
	 *
	 * @var int
	 */
	public $guild_scheduled_event_id;

	/**
	 * how many users to receive from the event
	 *
	 * @var string Number as a string
	 */
	public $limit = '100';

	/**
	 * guild member data for this user for the guild which this event belongs to, if any
	 *
	 * @var GuildScheduledEventUser
	 */
	public $member;

	/**
	 * the name of the scheduled event
	 *
	 * @var string
	 */
	public $name;

	/**
	 * the privacy level of the scheduled event
	 *
	 * @var privacy level
	 */
	public $privacy_level;

	/**
	 * the time when the scheduled event is scheduled to end
	 *
	 * @var \DateTimeImmutable
	 */
	public $scheduled_end_time;

	/**
	 * the time to schedule the scheduled event
	 *
	 * @var \DateTimeImmutable
	 */
	public $scheduled_start_time;

	/**
	 * the status of the scheduled event
	 *
	 * @var event status
	 */
	public $status;

	/**
	 * user which subscribed to an event
	 *
	 * @var user
	 */
	public $user;

	/**
	 * include guild member data if it exists
	 *
	 * @var bool
	 */
	public $with_member = false;

	/**
	 * include number of users subscribed to each event
	 *
	 * @var bool
	 */
	public $with_user_count = false;

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