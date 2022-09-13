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
 * GuildPreview Model
 */
class GuildPreview {

	/**
	 * approximate number of members in this guild
	 *
	 * @var int
	 */
	public $approximate_member_count;

	/**
	 * approximate number of online members in this guild
	 *
	 * @var int
	 */
	public $approximate_presence_count;

	/**
	 * the description for the guild, if the guild is discoverable
	 *
	 * @var string
	 */
	public $description;

	/**
	 * discovery splash hash
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
	 * enabled guild features
	 *
	 * @var array
	 */
	public $features;

	/**
	 * icon hash
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * guild id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * guild name (2-100 characters)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * splash hash
	 *
	 * @var string
	 */
	public $splash;

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