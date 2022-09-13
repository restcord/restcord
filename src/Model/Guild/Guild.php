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
	 * approximate number of members in this guild, returned from the GET /guilds/<id> endpoint when with_counts is true
	 *
	 * @var int
	 */
	public $approximate_member_count;

	/**
	 * approximate number of non-offline members in this guild, returned from the GET /guilds/<id> endpoint when with_counts is true
	 *
	 * @var int
	 */
	public $approximate_presence_count;

	/**
	 * banner hash
	 *
	 * @var string
	 */
	public $banner;

	/**
	 * channels in the guild
	 *
	 * @var array
	 */
	public $channels;

	/**
	 * default message notifications level
	 *
	 * @var int
	 */
	public $default_message_notifications;

	/**
	 * the description of a Community guild
	 *
	 * @var string
	 */
	public $description;

	/**
	 * discovery splash hash; only present for guilds with the "DISCOVERABLE" feature
	 *
	 * @var string
	 */
	public $discovery_splash;

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
	 * the scheduled events in the guild
	 *
	 * @var array
	 */
	public $guild_scheduled_events;

	/**
	 * icon hash
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * icon hash, returned when in the template object
	 *
	 * @var string
	 */
	public $icon_hash;

	/**
	 * guild id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * when this guild was joined at
	 *
	 * @var \DateTimeImmutable
	 */
	public $joined_at;

	/**
	 * true if this is considered a large guild
	 *
	 * @var bool
	 */
	public $large = false;

	/**
	 * the maximum number of members for the guild
	 *
	 * @var int
	 */
	public $max_members;

	/**
	 * the maximum number of presences for the guild (null is always returned, apart from the largest of guilds)
	 *
	 * @var int
	 */
	public $max_presences;

	/**
	 * the maximum amount of users in a video channel
	 *
	 * @var int
	 */
	public $max_video_channel_users;

	/**
	 * total number of members in this guild
	 *
	 * @var int
	 */
	public $member_count;

	/**
	 * users in the guild
	 *
	 * @var array
	 */
	public $members;

	/**
	 * required MFA level for the guild
	 *
	 * @var int
	 */
	public $mfa_level;

	/**
	 * guild name (2-100 characters, excluding trailing and leading whitespace)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * guild NSFW level
	 *
	 * @var int
	 */
	public $nsfw_level;

	/**
	 * true if the user is the owner of the guild
	 *
	 * @var bool
	 */
	public $owner = false;

	/**
	 * id of owner
	 *
	 * @var int
	 */
	public $owner_id;

	/**
	 * total permissions for the user in the guild (excludes overwrites)
	 *
	 * @var string
	 */
	public $permissions;

	/**
	 * the preferred locale of a Community guild; used in server discovery and notices from Discord; defaults to "en-US"
	 *
	 * @var string
	 */
	public $preferred_locale;

	/**
	 * whether the guild has the boost progress bar enabled
	 *
	 * @var bool
	 */
	public $premium_progress_bar_enabled = false;

	/**
	 * the number of boosts this guild currently has
	 *
	 * @var int
	 */
	public $premium_subscription_count;

	/**
	 * premium tier (Server Boost level)
	 *
	 * @var int
	 */
	public $premium_tier;

	/**
	 * presences of the members in the guild, will only include non-offline members if the size is greater than large threshold
	 *
	 * @var array
	 */
	public $presences;

	/**
	 * the id of the channel where admins and moderators of Community guilds receive notices from Discord
	 *
	 * @var int
	 */
	public $public_updates_channel_id;

	/**
	 * voice region id for the guild (deprecated)
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
	 * the id of the channel where Community guilds can display rules and/or guidelines
	 *
	 * @var int
	 */
	public $rules_channel_id;

	/**
	 * splash hash
	 *
	 * @var string
	 */
	public $splash;

	/**
	 * Stage instances in the guild
	 *
	 * @var array
	 */
	public $stage_instances;

	/**
	 * custom guild stickers
	 *
	 * @var array
	 */
	public $stickers;

	/**
	 * system channel flags
	 *
	 * @var int
	 */
	public $system_channel_flags;

	/**
	 * the id of the channel where guild notices such as welcome messages and boost events are posted
	 *
	 * @var int
	 */
	public $system_channel_id;

	/**
	 * all active threads in the guild that current user has permission to view
	 *
	 * @var array
	 */
	public $threads;

	/**
	 * true if this guild is unavailable due to an outage
	 *
	 * @var bool
	 */
	public $unavailable = false;

	/**
	 * the vanity url code for the guild
	 *
	 * @var string
	 */
	public $vanity_url_code;

	/**
	 * verification level required for the guild
	 *
	 * @var int
	 */
	public $verification_level;

	/**
	 * states of members currently in voice channels; lacks the guild_id key
	 *
	 * @var array
	 */
	public $voice_states;

	/**
	 * the welcome screen of a Community guild, shown to new members, returned in an Invite's guild object
	 *
	 * @var array
	 */
	public $welcome_screen;

	/**
	 * the channel id that the widget will generate an invite to, or null if set to no invite
	 *
	 * @var int
	 */
	public $widget_channel_id;

	/**
	 * true if the server widget is enabled
	 *
	 * @var bool
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