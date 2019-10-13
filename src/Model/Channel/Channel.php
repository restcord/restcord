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

namespace RestCord\Model\Channel;

/**
 * Channel Model
 */
class Channel {

	/**
	 * application id of the group DM creator if it is bot-created
	 *
	 * @var int|null
	 */
	public $application_id;

	/**
	 * the bitrate (in bits) of the voice channel
	 *
	 * @var int|null
	 */
	public $bitrate;

	/**
	 * the id of the guild
	 *
	 * @var int|null
	 */
	public $guild_id;

	/**
	 * icon hash
	 *
	 * @var string|null
	 */
	public $icon;

	/**
	 * the id of this channel
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the id of the last message sent in this channel (may not point to an existing or valid message)
	 *
	 * @var int|null
	 */
	public $last_message_id;

	/**
	 * when the last pinned message was pinned
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $last_pin_timestamp;

	/**
	 * the name of the channel (2-100 characters)
	 *
	 * @var string|null
	 */
	public $name;

	/**
	 * whether the channel is nsfw
	 *
	 * @var bool|null
	 */
	public $nsfw = false;

	/**
	 * id of the DM creator
	 *
	 * @var int|null
	 */
	public $owner_id;

	/**
	 * id of the parent category for a channel
	 *
	 * @var int|null
	 */
	public $parent_id;

	/**
	 * explicit permission overwrites for members and roles
	 *
	 * @var array|null
	 */
	public $permission_overwrites;

	/**
	 * sorting position of the channel
	 *
	 * @var int|null
	 */
	public $position;

	/**
	 * amount of seconds a user has to wait before sending another message (0-21600); bots, as well as users with the permission manage_messages or manage_channel, are unaffected
	 *
	 * @var int|null
	 */
	public $rate_limit_per_user;

	/**
	 * the recipients of the DM
	 *
	 * @var array|null
	 */
	public $recipients;

	/**
	 * the channel topic (0-1024 characters)
	 *
	 * @var string|null
	 */
	public $topic;

	/**
	 * the type of channel
	 *
	 * @var int
	 */
	public $type;

	/**
	 * the user limit of the voice channel
	 *
	 * @var int|null
	 */
	public $user_limit;

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