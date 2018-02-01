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
	public $Application_id;

	/**
	 * the bitrate (in bits) of the voice channel
	 * 
	 * @var int|null
	 */
	public $Bitrate;

	/**
	 * the id of the guild
	 * 
	 * @var int|null
	 */
	public $Guild_id;

	/**
	 * icon hash
	 * 
	 * @var string|null
	 */
	public $Icon;

	/**
	 * the id of this channel
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * the id of the last message sent in this channel (may not point to an existing or valid message)
	 * 
	 * @var int|null
	 */
	public $Last_message_id;

	/**
	 * when the last pinned message was pinned
	 * 
	 * @var ISO8601 timestamp|null
	 */
	public $Last_pin_timestamp;

	/**
	 * the name of the channel (2-100 characters)
	 * 
	 * @var string|null
	 */
	public $Name;

	/**
	 * if the channel is nsfw
	 * 
	 * @var bool|null
	 */
	public $Nsfw = false;

	/**
	 * id of the DM creator
	 * 
	 * @var int|null
	 */
	public $Owner_id;

	/**
	 * id of the parent category for a channel
	 * 
	 * @var int|null
	 */
	public $Parent_id;

	/**
	 * explicit permission overwrites for members and roles
	 * 
	 * @var array|null
	 */
	public $Permission_overwrites;

	/**
	 * sorting position of the channel
	 * 
	 * @var int|null
	 */
	public $Position;

	/**
	 * the recipients of the DM
	 * 
	 * @var array|null
	 */
	public $Recipients;

	/**
	 * the channel topic (0-1024 characters)
	 * 
	 * @var string|null
	 */
	public $Topic;

	/**
	 * the type of channel
	 * 
	 * @var int
	 */
	public $Type;

	/**
	 * the user limit of the voice channel
	 * 
	 * @var int|null
	 */
	public $User_limit;

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