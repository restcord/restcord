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

namespace RestCord\Model\Application;

/**
 * Application Model
 */
class Application {

	/**
	 * when false only app owner can join the app's bot to guilds
	 *
	 * @var bool
	 */
	public $bot_public = false;

	/**
	 * when true the app's bot will only join upon completion of the full oauth2 code grant flow
	 *
	 * @var bool
	 */
	public $bot_require_code_grant = false;

	/**
	 * the application's default rich presence invite cover image hash
	 *
	 * @var string
	 */
	public $cover_image;

	/**
	 * the description of the app
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the application's public flags
	 *
	 * @var int
	 */
	public $flags;

	/**
	 * if this application is a game sold on Discord, this field will be the guild to which it has been linked
	 *
	 * @var int
	 */
	public $guild_id;

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
	 * partial user object containing info on the owner of the application
	 *
	 * @var array
	 */
	public $owner;

	/**
	 * if this application is a game sold on Discord, this field will be the id of the "Game SKU" that is created, if exists
	 *
	 * @var int
	 */
	public $primary_sku_id;

	/**
	 * the url of the app's privacy policy
	 *
	 * @var string
	 */
	public $privacy_policy_url;

	/**
	 * an array of rpc origin urls, if rpc is enabled
	 *
	 * @var array
	 */
	public $rpc_origins;

	/**
	 * if this application is a game sold on Discord, this field will be the URL slug that links to the store page
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * if this application is a game sold on Discord, this field will be the summary field for the store page of its primary sku
	 *
	 * @var string
	 */
	public $summary;

	/**
	 * if the application belongs to a team, this will be a list of the members of that team
	 *
	 * @var array
	 */
	public $team;

	/**
	 * the url of the app's terms of service
	 *
	 * @var string
	 */
	public $terms_of_service_url;

	/**
	 * the hex encoded key for verification in interactions and the GameSDK's GetTicket
	 *
	 * @var string
	 */
	public $verify_key;

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