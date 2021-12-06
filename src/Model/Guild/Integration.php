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
 * Integration Model
 */
class Integration {

	/**
	 * integration account information
	 *
	 * @var array
	 */
	public $account;

	/**
	 * The bot/OAuth2 application for discord integrations
	 *
	 * @var array
	 */
	public $application;

	/**
	 * whether emoticons should be synced for this integration (twitch only currently)
	 *
	 * @var bool
	 */
	public $enable_emoticons = false;

	/**
	 * is this integration enabled
	 *
	 * @var bool
	 */
	public $enabled = false;

	/**
	 * the behavior of expiring subscribers
	 *
	 * @var integration expire behavior
	 */
	public $expire_behavior;

	/**
	 * the grace period (in days) before expiring subscribers
	 *
	 * @var int
	 */
	public $expire_grace_period;

	/**
	 * integration id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * integration name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * has this integration been revoked
	 *
	 * @var bool
	 */
	public $revoked = false;

	/**
	 * id that this integration uses for "subscribers"
	 *
	 * @var int
	 */
	public $role_id;

	/**
	 * how many subscribers this integration has
	 *
	 * @var int
	 */
	public $subscriber_count;

	/**
	 * when this integration was last synced
	 *
	 * @var \DateTimeImmutable
	 */
	public $synced_at;

	/**
	 * is this integration syncing
	 *
	 * @var bool
	 */
	public $syncing = false;

	/**
	 * integration type (twitch, youtube, or discord)
	 *
	 * @var string
	 */
	public $type;

	/**
	 * user for this integration
	 *
	 * @var \RestCord\Model\User\User
	 */
	public $user;

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