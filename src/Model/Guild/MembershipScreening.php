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
 * MembershipScreening Model
 */
class MembershipScreening {

	/**
	 * an oauth2 access token granted with the guilds.join to the bot's application for the user you want to add to the guild
	 *
	 * @var string
	 */
	public $access_token;

	/**
	 * id for afk channel
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
	 * the highest user id in the previous page
	 *
	 * @var int
	 */
	public $after;

	/**
	 * base64 16:9 png/jpeg image for the guild banner (when the server has the BANNER feature)
	 *
	 * @var image data
	 */
	public $banner;

	/**
	 * the bitrate (in bits) of the voice channel (voice only)
	 *
	 * @var int
	 */
	public $bitrate;

	/**
	 * the id of the channel the user is currently in
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * new guild's channels
	 *
	 * @var array
	 */
	public $channels;

	/**
	 * RGB color value
	 *
	 * @var int
	 */
	public $color;

	/**
	 * whether 'pruned' is returned, discouraged for large guilds
	 *
	 * @var bool
	 */
	public $compute_prune_count = true;

	/**
	 * number of days to prune (1-30)
	 *
	 * @var int
	 */
	public $days = 7;

	/**
	 * whether the user is deafened in voice channels. Will throw a 400 if the user is not in a voice channel
	 *
	 * @var bool
	 */
	public $deaf = false;

	/**
	 * default message notification level
	 *
	 * @var int
	 */
	public $default_message_notifications;

	/**
	 * number of days to delete messages for (0-7)
	 *
	 * @var int
	 */
	public $delete_message_days;

	/**
	 * the server description to show in the welcome screen
	 *
	 * @var string
	 */
	public $description;

	/**
	 * base64 16:9 png/jpeg image for the guild discovery splash (when the server has the DISCOVERABLE feature)
	 *
	 * @var image data
	 */
	public $discovery_splash;

	/**
	 * whether the welcome screen is enabled
	 *
	 * @var bool
	 */
	public $enabled = false;

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
	 * whether the role should be displayed separately in the sidebar
	 *
	 * @var bool
	 */
	public $hoist = false;

	/**
	 * the role's icon image (if the guild has the ROLE_ICONS feature)
	 *
	 * @var image data
	 */
	public $icon;

	/**
	 * role
	 *
	 * @var int
	 */
	public $id;

	/**
	 * role(s) to include
	 *
	 * @var array
	 */
	public $include_roles = 'none';

	/**
	 * max number of members to return (1-1000)
	 *
	 * @var int
	 */
	public $limit = 1;

	/**
	 * syncs the permission overwrites with the new parent, if moving to a new category
	 *
	 * @var bool
	 */
	public $lock_permissions = false;

	/**
	 * whether the role should be mentionable
	 *
	 * @var bool
	 */
	public $mentionable = false;

	/**
	 * whether the user is muted in voice channels. Will throw a 400 if the user is not in a voice channel
	 *
	 * @var bool
	 */
	public $mute = false;

	/**
	 * name of the role
	 *
	 * @var string
	 */
	public $name;

	/**
	 * value to set users nickname to
	 *
	 * @var string
	 */
	public $nick;

	/**
	 * whether the channel is nsfw
	 *
	 * @var bool
	 */
	public $nsfw = false;

	/**
	 * user id to transfer guild ownership to (must be owner)
	 *
	 * @var int
	 */
	public $owner_id;

	/**
	 * the new parent ID for the channel that is moved
	 *
	 * @var int
	 */
	public $parent_id;

	/**
	 * the channel's permission overwrites
	 *
	 * @var array
	 */
	public $permission_overwrites;

	/**
	 * bitwise value of the enabled/disabled permissions
	 *
	 * @var string
	 */
	public $permissions;

	/**
	 * sorting position of the role
	 *
	 * @var int
	 */
	public $position;

	/**
	 * the preferred locale of a Community guild used in server discovery and notices from Discord; defaults to "en-US"
	 *
	 * @var string
	 */
	public $preferred_locale;

	/**
	 * whether the guild's boost progress bar should be enabled.
	 *
	 * @var bool
	 */
	public $premium_progress_bar_enabled = false;

	/**
	 * the id of the channel where admins and moderators of Community guilds receive notices from Discord
	 *
	 * @var int
	 */
	public $public_updates_channel_id;

	/**
	 * Query string to match username(s) and nickname(s) against.
	 *
	 * @var string
	 */
	public $query = '';

	/**
	 * amount of seconds a user has to wait before sending another message (0-21600); bots, as well as users with the permission manage_messages or manage_channel, are unaffected
	 *
	 * @var int
	 */
	public $rate_limit_per_user;

	/**
	 * reason for the prune (deprecated)
	 *
	 * @var string
	 */
	public $reason = '';

	/**
	 * guild voice region id (deprecated)
	 *
	 * @var string
	 */
	public $region;

	/**
	 * sets the user's request to speak
	 *
	 * @var \DateTimeImmutable
	 */
	public $request_to_speak_timestamp;

	/**
	 * array of role ids the member is assigned
	 *
	 * @var int[]
	 */
	public $roles;

	/**
	 * the id of the channel where Community guilds display rules and/or guidelines
	 *
	 * @var int
	 */
	public $rules_channel_id;

	/**
	 * base64 16:9 png/jpeg image for the guild splash (when the server has the INVITE_SPLASH feature)
	 *
	 * @var image data
	 */
	public $splash;

	/**
	 * style of the widget image returned (see below)
	 *
	 * @var string
	 */
	public $style = 'shield';

	/**
	 * toggles the user's suppress state
	 *
	 * @var bool
	 */
	public $suppress = false;

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
	 * channel topic (0-1024 characters)
	 *
	 * @var string
	 */
	public $topic;

	/**
	 * the type of channel
	 *
	 * @var int
	 */
	public $type;

	/**
	 * the role's unicode emoji as a standard emoji (if the guild has the ROLE_ICONS feature)
	 *
	 * @var string
	 */
	public $unicode_emoji;

	/**
	 * the user limit of the voice channel (voice only)
	 *
	 * @var int
	 */
	public $user_limit;

	/**
	 * verification level
	 *
	 * @var int
	 */
	public $verification_level;

	/**
	 * channels linked in the welcome screen and their display options
	 *
	 * @var array
	 */
	public $welcome_channels;

	/**
	 * when true, will return approximate member and presence counts for the guild
	 *
	 * @var bool
	 */
	public $with_counts = false;

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