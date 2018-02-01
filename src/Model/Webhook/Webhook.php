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
	 * @var avatar data string
	 */
	public $Avatar;

	/**
	 * override the default avatar of the webhook
	 * 
	 * @var string
	 */
	public $Avatar_url;

	/**
	 * the new channel id this webhook should be moved to
	 * 
	 * @var int
	 */
	public $Channel_id;

	/**
	 * the message contents (up to 2000 characters)
	 * 
	 * @var string
	 */
	public $Content;

	/**
	 * embedded rich content
	 * 
	 * @var array
	 */
	public $Embeds;

	/**
	 * the contents of the file being sent
	 * 
	 * @var file contents
	 */
	public $File;

	/**
	 * the guild id this webhook is for
	 * 
	 * @var int|null
	 */
	public $Guild_id;

	/**
	 * the id of the webhook
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * the default name of the webhook
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * the secure token of the webhook
	 * 
	 * @var string
	 */
	public $Token;

	/**
	 * true if this is a TTS message
	 * 
	 * @var bool
	 */
	public $Tts = false;

	/**
	 * the user this webhook was created by (not returned when getting a webhook with its token)
	 * 
	 * @var array|null
	 */
	public $User;

	/**
	 * override the default username of the webhook
	 * 
	 * @var string
	 */
	public $Username;

	/**
	 * waits for server confirmation of message send before response (defaults to true; when false a message that is not saved does not return an error)
	 * 
	 * @var bool
	 */
	public $Wait = false;

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