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
 * Embed Response class
 */
class Embed {

	/**
	 * @var array Author information
	 */
	public $author;

	/**
	 * @var int Color code of the embed
	 */
	public $color;

	/**
	 * @var string Description of embed
	 */
	public $description;

	/**
	 * @var array Fields information
	 */
	public $fields;

	/**
	 * @var array Footer information
	 */
	public $footer;

	/**
	 * @var array Image information
	 */
	public $image;

	/**
	 * @var array Provider information
	 */
	public $provider;

	/**
	 * @var array Thumbnail information
	 */
	public $thumbnail;

	/**
	 * @var date Timestamp of embed content
	 */
	public $timestamp;

	/**
	 * @var string Title of embed
	 */
	public $title;

	/**
	 * @var string Type of embed (always "rich" for webhook embeds)
	 */
	public $type;

	/**
	 * @var string Url of embed
	 */
	public $url;

	/**
	 * @var array Video information
	 */
	public $video;
}