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
 * Emoji Response class
 */
class Emoji {

	/**
	 * @var int Emoji id
	 */
	public $id;

	/**
	 * @var bool Whether this emoji is managed
	 */
	public $managed;

	/**
	 * @var string Emoji name
	 */
	public $name;

	/**
	 * @var bool Whether this emoji must be wrapped in colons
	 */
	public $require_colons;

	/**
	 * @var array Roles this emoji is active for
	 */
	public $roles;
}