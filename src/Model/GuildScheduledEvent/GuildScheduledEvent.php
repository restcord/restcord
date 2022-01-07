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
 * GuildScheduledEvent Model
 */
class GuildScheduledEvent {

	/**
	 * the channel id in which the scheduled event will be hosted, or null if scheduled entity type is EXTERNAL
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * the user that created the scheduled event
	 *
	 * @var array
	 */
	public $creator;

	/**
	 * the id of the user that created the scheduled event *
	 *
	 * @var int
	 */
	public $creator_id;

	/**
	 * the description of the scheduled event (1-1000 characters)
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the id of an entity associated with a guild scheduled event
	 *
	 * @var int
	 */
	public $entity_id;

	/**
	 * additional metadata for the guild scheduled event
	 *
	 * @var array
	 */
	public $entity_metadata;

	/**
	 * the type of the scheduled event
	 *
	 * @var int
	 */
	public $entity_type;

	/**
	 * the guild id which the scheduled event belongs to
	 *
	 * @var int
	 */
	public $guild_id;

	/**
	 * the id of the scheduled event
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the name of the scheduled event (1-100 characters)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * the privacy level of the scheduled event
	 *
	 * @var int
	 */
	public $privacy_level;

	/**
	 * the time the scheduled event will end, required if entity_type is EXTERNAL
	 *
	 * @var \DateTimeImmutable
	 */
	public $scheduled_end_time;

	/**
	 * the time the scheduled event will start
	 *
	 * @var \DateTimeImmutable
	 */
	public $scheduled_start_time;

	/**
	 * the status of the scheduled event
	 *
	 * @var int
	 */
	public $status;

	/**
	 * the number of users subscribed to the scheduled event
	 *
	 * @var int
	 */
	public $user_count;

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