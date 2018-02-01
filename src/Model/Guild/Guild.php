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
	public $Afk_channel_id;

	/**
	 * afk timeout in seconds
	 * 
	 * @var int
	 */
	public $Afk_timeout;

	/**
	 * application id of the guild creator if it is bot-created
	 * 
	 * @var int
	 */
	public $Application_id;

	/**
	 * channels in the guild
	 * 
	 * @var array|null
	 */
	public $Channels;

	/**
	 * default message notifications level
	 * 
	 * @var int
	 */
	public $Default_message_notifications;

	/**
	 * id of embedded channel
	 * 
	 * @var int|null
	 */
	public $Embed_channel_id;

	/**
	 * is this guild embeddable (e.g. widget)
	 * 
	 * @var bool|null
	 */
	public $Embed_enabled = false;

	/**
	 * custom guild emojis
	 * 
	 * @var array
	 */
	public $Emojis;

	/**
	 * explicit content filter level
	 * 
	 * @var int
	 */
	public $Explicit_content_filter;

	/**
	 * enabled guild features
	 * 
	 * @var array
	 */
	public $Features;

	/**
	 * icon hash
	 * 
	 * @var string
	 */
	public $Icon;

	/**
	 * guild id
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * when this guild was joined at
	 * 
	 * @var ISO8601 timestamp|null
	 */
	public $Joined_at;

	/**
	 * whether this is considered a large guild
	 * 
	 * @var bool|null
	 */
	public $Large = false;

	/**
	 * total number of members in this guild
	 * 
	 * @var int|null
	 */
	public $Member_count;

	/**
	 * users in the guild
	 * 
	 * @var array|null
	 */
	public $Members;

	/**
	 * required MFA level for the guild
	 * 
	 * @var int
	 */
	public $Mfa_level;

	/**
	 * guild name (2-100 characters)
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * whether or not the user is the owner of the guild
	 * 
	 * @var bool|null
	 */
	public $Owner = false;

	/**
	 * id of owner
	 * 
	 * @var int
	 */
	public $Owner_id;

	/**
	 * total permissions for the user in the guild (does not include channel overrides)
	 * 
	 * @var int|null
	 */
	public $Permissions;

	/**
	 * presences of the users in the guild
	 * 
	 * @var array|null
	 */
	public $Presences;

	/**
	 * voice region id for the guild
	 * 
	 * @var string
	 */
	public $Region;

	/**
	 * roles in the guild
	 * 
	 * @var array
	 */
	public $Roles;

	/**
	 * splash hash
	 * 
	 * @var string
	 */
	public $Splash;

	/**
	 * the id of the channel to which system messages are sent
	 * 
	 * @var int
	 */
	public $System_channel_id;

	/**
	 * is this guild unavailable
	 * 
	 * @var bool|null
	 */
	public $Unavailable = false;

	/**
	 * verification level required for the guild
	 * 
	 * @var int
	 */
	public $Verification_level;

	/**
	 * (without the guild_id key)
	 * 
	 * @var array|null
	 */
	public $Voice_states;

	/**
	 * the channel id for the server widget
	 * 
	 * @var int|null
	 */
	public $Widget_channel_id;

	/**
	 * whether or not the server widget is enabled
	 * 
	 * @var bool|null
	 */
	public $Widget_enabled = false;

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