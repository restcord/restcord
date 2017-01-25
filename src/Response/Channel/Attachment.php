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
 * Attachment Response class
 */
class Attachment {

	/**
	 * @var string Name of file attached
	 */
	public $filename;

	/**
	 * @var int|null Height of file (if image)
	 */
	public $height;

	/**
	 * @var int Attachment id
	 */
	public $id;

	/**
	 * @var string A proxied url of file
	 */
	public $proxy_url;

	/**
	 * @var int Size of file in bytes
	 */
	public $size;

	/**
	 * @var string Source url of file
	 */
	public $url;

	/**
	 * @var int|null Width of file (if image)
	 */
	public $width;
}