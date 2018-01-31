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
	 * permission bit set
	 * 
	 * @var int
	 */
	public $allow;

	/**
	 * application id of the group DM creator if it is bot-created
	 * 
	 * @var int|null
	 */
	public $application_id;

	/**
	 * any attached files
	 * 
	 * @var array
	 */
	public $attachments;

	/**
	 * author information
	 * 
	 * @var array
	 */
	public $author;

	/**
	 * the bitrate (in bits) of the voice channel
	 * 
	 * @var int|null
	 */
	public $bitrate;

	/**
	 * id of the channel the message was sent in
	 * 
	 * @var int
	 */
	public $channel_id;

	/**
	 * color code of the embed
	 * 
	 * @var int
	 */
	public $color;

	/**
	 * contents of the message
	 * 
	 * @var string
	 */
	public $content;

	/**
	 * times this emoji has been used to react
	 * 
	 * @var int
	 */
	public $count;

	/**
	 * permission bit set
	 * 
	 * @var int
	 */
	public $deny;

	/**
	 * description of embed
	 * 
	 * @var string
	 */
	public $description;

	/**
	 * when this message was edited (or null if never)
	 * 
	 * @var ISO8601 timestamp
	 */
	public $edited_timestamp;

	/**
	 * any embedded content
	 * 
	 * @var array
	 */
	public $embeds;

	/**
	 * emoji information
	 * 
	 * @var array
	 */
	public $emoji;

	/**
	 * fields information
	 * 
	 * @var array
	 */
	public $fields;

	/**
	 * name of file attached
	 * 
	 * @var string
	 */
	public $filename;

	/**
	 * footer information
	 * 
	 * @var array
	 */
	public $footer;

	/**
	 * the id of the guild
	 * 
	 * @var int|null
	 */
	public $guild_id;

	/**
	 * height of file (if image)
	 * 
	 * @var int
	 */
	public $height;

	/**
	 * icon hash
	 * 
	 * @var string|null
	 */
	public $icon;

	/**
	 * url of footer icon (only supports http(s) and attachments)
	 * 
	 * @var string
	 */
	public $icon_url;

	/**
	 * attachment id
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * image information
	 * 
	 * @var array
	 */
	public $image;

	/**
	 * whether or not this field should display inline
	 * 
	 * @var bool
	 */
	public $inline = false;

	/**
	 * the id of the last message sent in this channel (may not point to an existing or valid message)
	 * 
	 * @var int|null
	 */
	public $last_message_id;

	/**
	 * when the last pinned message was pinned
	 * 
	 * @var ISO8601 timestamp|null
	 */
	public $last_pin_timestamp;

	/**
	 * whether the current user reacted using this emoji
	 * 
	 * @var bool
	 */
	public $me = false;

	/**
	 * whether this message mentions everyone
	 * 
	 * @var bool
	 */
	public $mention_everyone = false;

	/**
	 * roles specifically mentioned in this message
	 * 
	 * @var array
	 */
	public $mention_roles;

	/**
	 * users specifically mentioned in the message
	 * 
	 * @var array
	 */
	public $mentions;

	/**
	 * name of the field
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * used for validating a message was sent
	 * 
	 * @var int|null
	 */
	public $nonce;

	/**
	 * if the channel is nsfw
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
	 * whether this message is pinned
	 * 
	 * @var bool
	 */
	public $pinned = false;

	/**
	 * sorting position of the channel
	 * 
	 * @var int|null
	 */
	public $position;

	/**
	 * provider information
	 * 
	 * @var array
	 */
	public $provider;

	/**
	 * a proxied url of footer icon
	 * 
	 * @var string
	 */
	public $proxy_icon_url;

	/**
	 * a proxied url of file
	 * 
	 * @var string
	 */
	public $proxy_url;

	/**
	 * reactions to the message
	 * 
	 * @var array|null
	 */
	public $reactions;

	/**
	 * the recipients of the DM
	 * 
	 * @var array|null
	 */
	public $recipients;

	/**
	 * size of file in bytes
	 * 
	 * @var int
	 */
	public $size;

	/**
	 * footer text
	 * 
	 * @var string
	 */
	public $text;

	/**
	 * thumbnail information
	 * 
	 * @var array
	 */
	public $thumbnail;

	/**
	 * timestamp of embed content
	 * 
	 * @var ISO8601 timestamp
	 */
	public $timestamp;

	/**
	 * title of embed
	 * 
	 * @var string
	 */
	public $title;

	/**
	 * the channel topic (0-1024 characters)
	 * 
	 * @var string|null
	 */
	public $topic;

	/**
	 * whether this was a TTS message
	 * 
	 * @var bool
	 */
	public $tts = false;

	/**
	 * type of embed (always "rich" for webhook embeds)
	 * 
	 * @var string
	 */
	public $type;

	/**
	 * source url of file
	 * 
	 * @var string
	 */
	public $url;

	/**
	 * the user limit of the voice channel
	 * 
	 * @var int|null
	 */
	public $user_limit;

	/**
	 * value of the field
	 * 
	 * @var string
	 */
	public $value;

	/**
	 * video information
	 * 
	 * @var array
	 */
	public $video;

	/**
	 * if the message is generated by a webhook, this is the webhook's id
	 * 
	 * @var int|null
	 */
	public $webhook_id;

	/**
	 * width of file (if image)
	 * 
	 * @var int
	 */
	public $width;

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