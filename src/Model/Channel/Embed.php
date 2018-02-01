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
	 * @var array
	 */
	public $author;

	/**
	 * color code of the embed
	 *
	 * @var int
	 */
	public $color;

	/**
	 * description of embed
	 *
	 * @var string
	 */
	public $description;

	/**
	 * fields information
	 *
	 * @var array
	 */
	public $fields;

	/**
	 * footer information
	 *
	 * @var array
	 */
	public $footer;

	/**
	 * height of image
	 *
	 * @var int
	 */
	public $height;

	/**
	 * url of footer icon (only supports http(s) and attachments)
	 *
	 * @var string
	 */
	public $icon_url;

	/**
	 * image information
	 *
	 * @var array
	 */
	public $image;

	/**
	 * whether or not this field should display inline
	 *
	 * @var bool
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
	 * @var array
	 */
	public $provider;

	/**
	 * a proxied url of footer icon
	 *
	 * @var string
	 */
	public $proxy_icon_url;

	/**
	 * a proxied url of the image
	 *
	 * @var string
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
	 * @var array
	 */
	public $thumbnail;

	/**
	 * timestamp of embed content
	 *
	 * @var int
	 */
	public $timestamp;

	/**
	 * title of embed
	 *
	 * @var string
	 */
	public $title;

	/**
	 * type of embed (always "rich" for webhook embeds)
	 *
	 * @var string
	 */
	public $type;

	/**
	 * url of author
	 *
	 * @var string
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
	 * @var array
	 */
	public $video;

	/**
	 * width of image
	 *
	 * @var int
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