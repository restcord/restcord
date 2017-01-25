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

namespace RestCord\Response\User;

/**
 * Connection Response class
 */
class Connection {

	/**
	 * @var string Id of the connection account
	 */
	public $id;

	/**
	 * @var array An array of partial server integrations
	 */
	public $integrations;

	/**
	 * @var string The username of the connection account
	 */
	public $name;

	/**
	 * @var bool Whether the connection is revoked
	 */
	public $revoked;

	/**
	 * @var string The service of the connection (twitch, youtube)
	 */
	public $type;
}