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

namespace RestCord\Model\Channel;

/**
 * Embed Model
 */
class Embed {

	/**
	 * author information
	 *
	 * @var array|null
	 */
	public $author;

	/**
	 * color code of the embed
	 *
	 * @var int|null
	 */
	public $color;

	/**
	 * description of embed
	 *
	 * @var string|null
	 */
	public $description;

	/**
	 * fields information
	 *
	 * @var array|null
	 */
	public $fields;

	/**
	 * footer information
	 *
	 * @var array|null
	 */
	public $footer;

	/**
	 * height of image
	 *
	 * @var int|null
	 */
	public $height;

	/**
	 * url of footer icon (only supports http(s) and attachments)
	 *
	 * @var string|null
	 */
	public $icon_url;

	/**
	 * image information
	 *
	 * @var array|null
	 */
	public $image;

	/**
	 * whether or not this field should display inline
	 *
	 * @var bool|null
	 */
	public $inline = false;

	/**
	 * name of the field
	 *
	 * @var string
	 */
	public $name;

	/**
	 * provider information
	 *
	 * @var array|null
	 */
	public $provider;

	/**
	 * a proxied url of footer icon
	 *
	 * @var string|null
	 */
	public $proxy_icon_url;

	/**
	 * a proxied url of the image
	 *
	 * @var string|null
	 */
	public $proxy_url;

	/**
	 * footer text
	 *
	 * @var string
	 */
	public $text;

	/**
	 * thumbnail information
	 *
	 * @var array|null
	 */
	public $thumbnail;

	/**
	 * timestamp of embed content
	 *
	 * @var \DateTimeImmutable|null
	 */
	public $timestamp;

	/**
	 * title of embed
	 *
	 * @var string|null
	 */
	public $title;

	/**
	 * type of embed (always "rich" for webhook embeds)
	 *
	 * @var string|null
	 */
	public $type;

	/**
	 * url of author
	 *
	 * @var string|null
	 */
	public $url;

	/**
	 * value of the field
	 *
	 * @var string
	 */
	public $value;

	/**
	 * video information
	 *
	 * @var array|null
	 */
	public $video;

	/**
	 * width of image
	 *
	 * @var int|null
	 */
	public $width;

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