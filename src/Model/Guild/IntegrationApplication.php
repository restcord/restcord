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
 * IntegrationApplication Model
 */
class IntegrationApplication {

	/**
	 * the bot associated with this application
	 *
	 * @var array
	 */
	public $bot;

	/**
	 * the description of the app
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the icon hash of the app
	 *
	 * @var string
	 */
	public $icon;

	/**
	 * the id of the app
	 *
	 * @var int
	 */
	public $id;

	/**
	 * the name of the app
	 *
	 * @var string
	 */
	public $name;

	/**
	 * the summary of the app
	 *
	 * @var string
	 */
	public $summary;

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