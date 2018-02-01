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
	public $Access_token;

	/**
	 * id for afk channel
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
	 * the highest user id in the previous page
	 * 
	 * @var int
	 */
	public $After;

	/**
	 * the bitrate (in bits) of the voice channel (voice only)
	 * 
	 * @var int
	 */
	public $Bitrate;

	/**
	 * id of channel to move user to (if they are connected to voice)
	 * 
	 * @var int
	 */
	public $Channel_id;

	/**
	 * new guild's channels
	 * 
	 * @var array
	 */
	public $Channels;

	/**
	 * RGB color value
	 * 
	 * @var int
	 */
	public $Color;

	/**
	 * number of days to prune (1 or more)
	 * 
	 * @var int
	 */
	public $Days;

	/**
	 * if the user is deafened
	 * 
	 * @var bool
	 */
	public $Deaf = false;

	/**
	 * default message notification level
	 * 
	 * @var int
	 */
	public $Default_message_notifications;

	/**
	 * number of days to delete messages for (0-7)
	 * 
	 * @var int
	 */
	public $DeleteMessageDays;

	/**
	 * whether emoticons should be synced for this integration (twitch only currently)
	 * 
	 * @var bool
	 */
	public $Enable_emoticons = false;

	/**
	 * the behavior when an integration subscription lapses (see the integration object documentation)
	 * 
	 * @var int
	 */
	public $Expire_behavior;

	/**
	 * period (in seconds) where the integration will ignore lapsed subscriptions
	 * 
	 * @var int
	 */
	public $Expire_grace_period;

	/**
	 * explicit content filter level
	 * 
	 * @var int
	 */
	public $Explicit_content_filter;

	/**
	 * whether the role should be displayed separately in the sidebar
	 * 
	 * @var bool
	 */
	public $Hoist = false;

	/**
	 * base64 128x128 jpeg image for the guild icon
	 * 
	 * @var string
	 */
	public $Icon;

	/**
	 * the integration id
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * max number of members to return (1-1000)
	 * 
	 * @var int
	 */
	public $Limit = 1;

	/**
	 * whether the role should be mentionable
	 * 
	 * @var bool
	 */
	public $Mentionable = false;

	/**
	 * if the user is muted
	 * 
	 * @var bool
	 */
	public $Mute = false;

	/**
	 * name of the role
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * value to set users nickname to
	 * 
	 * @var string
	 */
	public $Nick;

	/**
	 * if the channel is nsfw
	 * 
	 * @var bool
	 */
	public $Nsfw = false;

	/**
	 * user id to transfer guild ownership to (must be owner)
	 * 
	 * @var int
	 */
	public $Owner_id;

	/**
	 * id of the parent category for a channel
	 * 
	 * @var int
	 */
	public $Parent_id;

	/**
	 * the channel's permission overwrites
	 * 
	 * @var array
	 */
	public $Permission_overwrites;

	/**
	 * bitwise of the enabled/disabled permissions
	 * 
	 * @var int
	 */
	public $Permissions;

	/**
	 * sorting position of the role
	 * 
	 * @var int
	 */
	public $Position;

	/**
	 * reason for the ban
	 * 
	 * @var string
	 */
	public $Reason;

	/**
	 * guild voice region id
	 * 
	 * @var string
	 */
	public $Region;

	/**
	 * array of role ids the member is assigned
	 * 
	 * @var array
	 */
	public $Roles;

	/**
	 * base64 128x128 jpeg image for the guild splash (VIP only)
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
	 * the integration type
	 * 
	 * @var string
	 */
	public $Type;

	/**
	 * the banned user
	 * 
	 * @var array
	 */
	public $User;

	/**
	 * the user limit of the voice channel (voice only)
	 * 
	 * @var int
	 */
	public $User_limit;

	/**
	 * verification level
	 * 
	 * @var int
	 */
	public $Verification_level;

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