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

namespace RestCord\Response\Guild;

/**
 * Guild Response class
 */
class Guild {

	/**
	 * @var int Id of afk channel
	 */
	public $afk_channel_id;

	/**
	 * @var int Afk timeout in seconds
	 */
	public $afk_timeout;

	/**
	 * @var array Array of channel objects
	 */
	public $channels ;

	/**
	 * @var int Default message notifications level
	 */
	public $default_message_notifications;

	/**
	 * @var int Id of embedded channel
	 */
	public $embed_channel_id;

	/**
	 * @var bool Is this guild embeddable (e.g. widget)
	 */
	public $embed_enabled;

	/**
	 * @var array Array of emoji objects
	 */
	public $emojis;

	/**
	 * @var array Array of guild features
	 */
	public $features;

	/**
	 * @var string Icon hash
	 */
	public $icon;

	/**
	 * @var int Guild id
	 */
	public $id;

	/**
	 * @var \DateTime Date this guild was joined at
	 */
	public $joined_at ;

	/**
	 * @var bool Whether this is considered a large guild
	 */
	public $large ;

	/**
	 * @var int Total number of members in this guild
	 */
	public $member_count;

	/**
	 * @var array Array of guild member objects
	 */
	public $members ;

	/**
	 * @var int Required MFA level for the guild
	 */
	public $mfa_level;

	/**
	 * @var string Guild name (2-100 characters)
	 */
	public $name;

	/**
	 * @var int Id of owner
	 */
	public $owner_id;

	/**
	 * @var array Array of simple presence objects, which share the same fields as Presence Update event sans a roles or guild_id key
	 */
	public $presences ;

	/**
	 * @var string {voice_region.id}
	 */
	public $region;

	/**
	 * @var array Array of role objects
	 */
	public $roles;

	/**
	 * @var string Splash hash
	 */
	public $splash;

	/**
	 * @var bool Is this guild unavailable
	 */
	public $unavailable ;

	/**
	 * @var int Level of verification
	 */
	public $verification_level;

	/**
	 * @var array Array of voice state objects (without the guild_id key)
	 */
	public $voice_states ;
}