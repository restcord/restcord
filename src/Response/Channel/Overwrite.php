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

namespace RestCord\Response\Channel;

/**
 * Overwrite Response class
 */
class Overwrite {

	/**
	 * @var int Permission bit set
	 */
	public $allow;

	/**
	 * @var int Permission bit set
	 */
	public $deny;

	/**
	 * @var int Role or user id
	 */
	public $id;

	/**
	 * @var string Either "role" or "member"
	 */
	public $type;
}