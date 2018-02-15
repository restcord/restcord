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
	public $filename;

	/**
	 * height of file (if image)
	 *
	 * @var int
	 */
	public $height;

	/**
	 * attachment id
	 *
	 * @var int
	 */
	public $id;

	/**
	 * a proxied url of file
	 *
	 * @var string
	 */
	public $proxy_url;

	/**
	 * size of file in bytes
	 *
	 * @var int
	 */
	public $size;

	/**
	 * source url of file
	 *
	 * @var string
	 */
	public $url;

	/**
	 * width of file (if image)
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