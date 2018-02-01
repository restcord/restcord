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
	public $Author;

	/**
	 * color code of the embed
	 * 
	 * @var int
	 */
	public $Color;

	/**
	 * description of embed
	 * 
	 * @var string
	 */
	public $Description;

	/**
	 * fields information
	 * 
	 * @var array
	 */
	public $Fields;

	/**
	 * footer information
	 * 
	 * @var array
	 */
	public $Footer;

	/**
	 * height of image
	 * 
	 * @var int
	 */
	public $Height;

	/**
	 * url of footer icon (only supports http(s) and attachments)
	 * 
	 * @var string
	 */
	public $Icon_url;

	/**
	 * image information
	 * 
	 * @var array
	 */
	public $Image;

	/**
	 * whether or not this field should display inline
	 * 
	 * @var bool
	 */
	public $Inline = false;

	/**
	 * name of the field
	 * 
	 * @var string
	 */
	public $Name;

	/**
	 * provider information
	 * 
	 * @var array
	 */
	public $Provider;

	/**
	 * a proxied url of footer icon
	 * 
	 * @var string
	 */
	public $Proxy_icon_url;

	/**
	 * a proxied url of the image
	 * 
	 * @var string
	 */
	public $Proxy_url;

	/**
	 * footer text
	 * 
	 * @var string
	 */
	public $Text;

	/**
	 * thumbnail information
	 * 
	 * @var array
	 */
	public $Thumbnail;

	/**
	 * timestamp of embed content
	 * 
	 * @var ISO8601 timestamp
	 */
	public $Timestamp;

	/**
	 * title of embed
	 * 
	 * @var string
	 */
	public $Title;

	/**
	 * type of embed (always "rich" for webhook embeds)
	 * 
	 * @var string
	 */
	public $Type;

	/**
	 * url of author
	 * 
	 * @var string
	 */
	public $Url;

	/**
	 * value of the field
	 * 
	 * @var string
	 */
	public $Value;

	/**
	 * video information
	 * 
	 * @var array
	 */
	public $Video;

	/**
	 * width of image
	 * 
	 * @var int
	 */
	public $Width;

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