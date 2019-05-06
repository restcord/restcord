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
	 * image for the default webhook avatar
	 *
	 * @var string
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
	 * the contents of the file being sent
	 *
	 * @var file contents
	 */
	public $file;

	/**
	 * the guild id this webhook is for
	 *
	 * @var int|null
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
	 * See message create
	 *
	 * @var string
	 */
	public $payload_json;

	/**
	 * the secure token of the webhook
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
	 * the user this webhook was created by (not returned when getting a webhook with its token)
	 *
	 * @var array|null
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