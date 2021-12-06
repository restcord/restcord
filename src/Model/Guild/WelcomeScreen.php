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
 * WelcomeScreen Model
 */
class WelcomeScreen {

	/**
	 * the channel's id
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * the description shown for the channel
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the emoji id, if the emoji is custom
	 *
	 * @var int
	 */
	public $emoji_id;

	/**
	 * the emoji name if custom, the unicode character if standard, or null if no emoji is set
	 *
	 * @var string
	 */
	public $emoji_name;

	/**
	 * the channels shown in the welcome screen, up to 5
	 *
	 * @var array
	 */
	public $welcome_channels;

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