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

namespace RestCord\Model\StageInstance;

/**
 * StageInstance Model
 */
class StageInstance {

	/**
	 * The id of the associated Stage channel
	 *
	 * @var int
	 */
	public $channel_id;

	/**
	 * Whether or not Stage Discovery is disabled
	 *
	 * @var bool
	 */
	public $discoverable_disabled = false;

	/**
	 * The guild id of the associated Stage channel
	 *
	 * @var int
	 */
	public $guild_id;

	/**
	 * The id of this Stage instance
	 *
	 * @var int
	 */
	public $id;

	/**
	 * The privacy level of the Stage instance
	 *
	 * @var int
	 */
	public $privacy_level;

	/**
	 * The topic of the Stage instance (1-120 characters)
	 *
	 * @var string
	 */
	public $topic;

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