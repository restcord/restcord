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
 * Ban Model
 */
class Ban {

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
	 * the bitrate (in bits) of the voice channel (voice only)
	 *
	 * @var int
	 */
	public $bitrate;

	/**
	 * id of channel to move user to (if they are connected to voice)
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
	public $compute_prune_count = false;

	/**
	 * number of days to prune (1 or more)
	 *
	 * @var int
	 */
	public $days;

	/**
	 * whether the user is deafened in voice channels
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
	 * @var int|null
	 */
	public $delete_message_days;

	/**
	 * whether emoticons should be synced for this integration (twitch only currently)
	 *
	 * @var bool
	 */
	public $enable_emoticons = false;

	/**
	 * the behavior when an integration subscription lapses (see the integration object documentation)
	 *
	 * @var int
	 */
	public $expire_behavior;

	/**
	 * period (in seconds) where the integration will ignore lapsed subscriptions
	 *
	 * @var int
	 */
	public $expire_grace_period;

	/**
	 * explicit content filter level
	 *
	 * @var int
	 */
	public $explicit_content_filter;

	/**
	 * whether the role should be displayed separately in the sidebar
	 *
	 * @var bool
	 */
	public $hoist = false;

	/**
	 * base64 128x128 jpeg image for the guild icon
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * the integration id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * max number of members to return (1-1000)
	 *
	 * @var int
	 */
	public $limit = 1;

	/**
	 * whether the role should be mentionable
	 *
	 * @var bool
	 */
	public $mentionable = false;

	/**
	 * whether the user is muted in voice channels
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
	 * id of the parent category for a channel
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
	 * @var int
	 */
	public $permissions;

	/**
	 * sorting position of the role
	 *
	 * @var int
	 */
	public $position;

	/**
	 * amount of seconds a user has to wait before sending another message (0-21600); bots, as well as users with the permission manage_messages or manage_channel, are unaffected
	 *
	 * @var int
	 */
	public $rate_limit_per_user;

	/**
	 * reason for the ban
	 *
	 * @var string|null
	 */
	public $reason;

	/**
	 * guild voice region id
	 *
	 * @var string
	 */
	public $region;

	/**
	 * array of role ids the member is assigned
	 *
	 * @var int[]
	 */
	public $roles;

	/**
	 * base64 128x128 jpeg image for the guild splash (VIP only)
	 *
	 * @var string
	 */
	public $splash;

	/**
	 * style of the widget image returned (see below)
	 *
	 * @var string
	 */
	public $style = 'shield';

	/**
	 * the id of the channel to which system messages are sent
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
	 * the integration type
	 *
	 * @var string
	 */
	public $type;

	/**
	 * the banned user
	 *
	 * @var \RestCord\Model\User\User
	 */
	public $user;

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