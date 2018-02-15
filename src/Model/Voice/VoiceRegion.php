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

namespace RestCord\Model\Voice;

/**
 * VoiceRegion Model
 */
class VoiceRegion {

	/**
	 * whether this is a custom voice region (used for events/etc)
	 *
	 * @var bool
	 */
	public $custom = false;

	/**
	 * whether this is a deprecated voice region (avoid switching to these)
	 *
	 * @var bool
	 */
	public $deprecated = false;

	/**
	 * unique ID for the region
	 *
	 * @var string
	 */
	public $id;

	/**
	 * name of the region
	 *
	 * @var string
	 */
	public $name;

	/**
	 * true for a single server that is closest to the current user's client
	 *
	 * @var bool
	 */
	public $optimal = false;

	/**
	 * true if this is a vip-only server
	 *
	 * @var bool
	 */
	public $vip = false;

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