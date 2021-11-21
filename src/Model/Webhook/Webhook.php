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

namespace RestCord\Model\Webhook;

/**
 * Webhook Model
 */
class Webhook {

	/**
	 * allowed mentions for the message
	 *
	 * @var array
	 */
	public $allowed_mentions;

	/**
	 * the bot/OAuth2 application that created this webhook
	 *
	 * @var int
	 */
	public $application_id;

	/**
	 * attached files to keep and possible descriptions for new files
	 *
	 * @var array
	 */
	public $attachments;

	/**
	 * image for the default webhook avatar
	 *
	 * @var image data
	 */
	public $avatar;

	/**
	 * override the default avatar of the webhook
	 *
	 * @var string
	 */
	public $avatar_url;

	/**
	 * the new channel id this webhook should be moved to
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * the components to include with the message
	 *
	 * @var array
	 */
	public $components;

	/**
	 * the message contents (up to 2000 characters)
	 *
	 * @var string
	 */
	public $content;

	/**
	 * embedded rich content
	 *
	 * @var array
	 */
	public $embeds;

	/**
	 * the contents of the file being sent/edited
	 *
	 * @var file contents
	 */
	public $files;

	/**
	 * the guild id this webhook is for, if any
	 *
	 * @var int
	 */
	public $guild_id;

	/**
	 * the id of the webhook
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the default name of the webhook
	 *
	 * @var string
	 */
	public $name;

	/**
	 * JSON encoded body of non-file params (multipart/form-data only)
	 *
	 * @var string
	 */
	public $payload_json;

	/**
	 * the channel that this webhook is following (returned for Channel Follower Webhooks)
	 *
	 * @var array
	 */
	public $source_channel;

	/**
	 * the guild of the channel that this webhook is following (returned for Channel Follower Webhooks)
	 *
	 * @var array
	 */
	public $source_guild;

	/**
	 * id of the thread the message is in
	 *
	 * @var int
	 */
	public $thread_id;

	/**
	 * the secure token of the webhook (returned for Incoming Webhooks)
	 *
	 * @var string
	 */
	public $token;

	/**
	 * true if this is a TTS message
	 *
	 * @var bool
	 */
	public $tts = false;

	/**
	 * the type of the webhook
	 *
	 * @var int
	 */
	public $type;

	/**
	 * the url used for executing the webhook (returned by the webhooks OAuth2 flow)
	 *
	 * @var string
	 */
	public $url;

	/**
	 * the user this webhook was created by (not returned when getting a webhook with its token)
	 *
	 * @var array
	 */
	public $user;

	/**
	 * override the default username of the webhook
	 *
	 * @var string
	 */
	public $username;

	/**
	 * waits for server confirmation of message send before response (defaults to true; when false a message that is not saved does not return an error)
	 *
	 * @var bool
	 */
	public $wait = false;

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