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

namespace RestCord\Response\Guild;

/**
 * Integration Response class
 */
class Integration {

	/**
	 * @var array Integration account information
	 */
	public $account;

	/**
	 * @var bool Is this integration enabled
	 */
	public $enabled;

	/**
	 * @var int The behavior of expiring subscribers
	 */
	public $expire_behavior;

	/**
	 * @var int The grace period before expiring subscribers
	 */
	public $expire_grace_period;

	/**
	 * @var int Integration id
	 */
	public $id;

	/**
	 * @var string Integration name
	 */
	public $name;

	/**
	 * @var int Id that this integration uses for "subscribers"
	 */
	public $role_id;

	/**
	 * @var int When this integration was last synced
	 */
	public $synced_at;

	/**
	 * @var bool Is this integration syncing
	 */
	public $syncing;

	/**
	 * @var string Integration type (twitch, youtube, etc)
	 */
	public $type;

	/**
	 * @var array User for this integration
	 */
	public $user;
}