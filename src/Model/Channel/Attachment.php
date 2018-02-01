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
 * Attachment Model
 */
class Attachment {

	/**
	 * name of file attached
	 * 
	 * @var string
	 */
	public $Filename;

	/**
	 * height of file (if image)
	 * 
	 * @var int
	 */
	public $Height;

	/**
	 * attachment id
	 * 
	 * @var int
	 */
	public $Id;

	/**
	 * a proxied url of file
	 * 
	 * @var string
	 */
	public $Proxy_url;

	/**
	 * size of file in bytes
	 * 
	 * @var int
	 */
	public $Size;

	/**
	 * source url of file
	 * 
	 * @var string
	 */
	public $Url;

	/**
	 * width of file (if image)
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