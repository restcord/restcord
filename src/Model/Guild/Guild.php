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
 * Guild Model
 */
class Guild {

	/**
	 * id of afk channel
	 * 
	 * @var int
	 */
	public $afk_channel_id;

	/**
	 * afk timeout in seconds
	 * 
	 * @var int
	 */
	public $afk_timeout;

	/**
	 * array of channel objects
	 * 
	 * @var \RestCord\Model\Channel\GuildChannel[]
	 */
	public $channels;

	/**
	 * default message notifications level
	 * 
	 * @var int
	 */
	public $default_message_notifications;

	/**
	 * id of embedded channel
	 * 
	 * @var int
	 */
	public $embed_channel_id;

	/**
	 * is this guild embeddable (e.g. widget)
	 * 
	 * @var bool
	 */
	public $embed_enabled = false;

	/**
	 * array of emoji objects
	 * 
	 * @var \RestCord\Model\Guild\Emoji[]
	 */
	public $emojis;

	/**
	 * array of guild features
	 * 
	 * @var array
	 */
	public $features;

	/**
	 * icon hash
	 * 
	 * @var string
	 */
	public $icon;

	/**
	 * guild id
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * date this guild was joined at
	 * 
	 * @var \DateTime
	 */
	public $joined_at;

	/**
	 * whether this is considered a large guild
	 * 
	 * @var bool
	 */
	public $large = false;

	/**
	 * total number of members in this guild
	 * 
	 * @var int
	 */
	public $member_count;

	/**
	 * array of guild member objects
	 * 
	 * @var \RestCord\Model\Guild\GuildMember[]
	 */
	public $members;

	/**
	 * required MFA level for the guild
	 * 
	 * @var int
	 */
	public $mfa_level;

	/**
	 * guild name (2-100 characters)
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * id of owner
	 * 
	 * @var int
	 */
	public $owner_id;

	/**
	 * array of simple presence objects, which share the same fields as Presence Update event sans a roles or guild_id key
	 * 
	 * @var array
	 */
	public $presences;

	/**
	 * {voice_region.id}
	 * 
	 * @var string
	 */
	public $region;

	/**
	 * array of role objects
	 * 
	 * @var \RestCord\Model\Permissions\Role[]
	 */
	public $roles;

	/**
	 * splash hash
	 * 
	 * @var string
	 */
	public $splash;

	/**
	 * is this guild unavailable
	 * 
	 * @var bool
	 */
	public $unavailable = false;

	/**
	 * level of verification
	 * 
	 * @var int
	 */
	public $verification_level;

	/**
	 * array of voice state objects (without the guild_id key)
	 * 
	 * @var \RestCord\Model\Voice\VoiceState[]
	 */
	public $voice_states;

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