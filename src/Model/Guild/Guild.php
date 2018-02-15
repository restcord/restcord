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

use RestCord\Traits\IconTrait;
use RestCord\Traits\SplashTrait;

/**
 * Guild Model
 */
class Guild {

	use IconTrait;
	use SplashTrait;

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
	 * application id of the guild creator if it is bot-created
	 *
	 * @var int
	 */
	public $application_id;

	/**
	 * channels in the guild
	 *
	 * @var array|null
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
	 * @var int|null
	 */
	public $embed_channel_id;

	/**
	 * is this guild embeddable (e.g. widget)
	 *
	 * @var bool|null
	 */
	public $embed_enabled = false;

	/**
	 * custom guild emojis
	 *
	 * @var array
	 */
	public $emojis;

	/**
	 * explicit content filter level
	 *
	 * @var int
	 */
	public $explicit_content_filter;

	/**
	 * enabled guild features
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
	 * when this guild was joined at
	 *
	 * @var int|null
	 */
	public $joined_at;

	/**
	 * whether this is considered a large guild
	 *
	 * @var bool|null
	 */
	public $large = false;

	/**
	 * total number of members in this guild
	 *
	 * @var int|null
	 */
	public $member_count;

	/**
	 * users in the guild
	 *
	 * @var array|null
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
	 * whether or not the user is the owner of the guild
	 *
	 * @var bool|null
	 */
	public $owner = false;

	/**
	 * id of owner
	 *
	 * @var int
	 */
	public $owner_id;

	/**
	 * total permissions for the user in the guild (does not include channel overrides)
	 *
	 * @var int|null
	 */
	public $permissions;

	/**
	 * presences of the users in the guild
	 *
	 * @var array|null
	 */
	public $presences;

	/**
	 * voice region id for the guild
	 *
	 * @var string
	 */
	public $region;

	/**
	 * roles in the guild
	 *
	 * @var array
	 */
	public $roles;

	/**
	 * splash hash
	 *
	 * @var string
	 */
	public $splash;

	/**
	 * the id of the channel to which system messages are sent
	 *
	 * @var int
	 */
	public $system_channel_id;

	/**
	 * is this guild unavailable
	 *
	 * @var bool|null
	 */
	public $unavailable = false;

	/**
	 * verification level required for the guild
	 *
	 * @var int
	 */
	public $verification_level;

	/**
	 * (without the guild_id key)
	 *
	 * @var array|null
	 */
	public $voice_states;

	/**
	 * the channel id for the server widget
	 *
	 * @var int|null
	 */
	public $widget_channel_id;

	/**
	 * whether or not the server widget is enabled
	 *
	 * @var bool|null
	 */
	public $widget_enabled = false;

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