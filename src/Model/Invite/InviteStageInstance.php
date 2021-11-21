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
 * InviteStageInstance Model
 */
class InviteStageInstance {

	/**
	 * the guild scheduled event to include with the invite
	 *
	 * @var int
	 */
	public $guild_scheduled_event_id;

	/**
	 * the members speaking in the Stage
	 *
	 * @var array
	 */
	public $members;

	/**
	 * the number of users in the Stage
	 *
	 * @var int
	 */
	public $participant_count;

	/**
	 * the number of users speaking in the Stage
	 *
	 * @var int
	 */
	public $speaker_count;

	/**
	 * the topic of the Stage instance (1-120 characters)
	 *
	 * @var string
	 */
	public $topic;

	/**
	 * whether the invite should contain approximate member counts
	 *
	 * @var bool
	 */
	public $with_counts = false;

	/**
	 * whether the invite should contain the expiration date
	 *
	 * @var bool
	 */
	public $with_expiration = false;

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