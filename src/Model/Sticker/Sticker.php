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

namespace RestCord\Model\Sticker;

/**
 * Sticker Model
 */
class Sticker {

	/**
	 * Deprecated previously the sticker asset hash, now an empty string
	 *
	 * @var string
	 */
	public $asset;

	/**
	 * whether this guild sticker can be used, may be false due to loss of Server Boosts
	 *
	 * @var bool
	 */
	public $available = false;

	/**
	 * description of the sticker
	 *
	 * @var string
	 */
	public $description;

	/**
	 * type of sticker format
	 *
	 * @var int
	 */
	public $format_type;

	/**
	 * id of the guild that owns this sticker
	 *
	 * @var int
	 */
	public $guild_id;

	/**
	 * id of the sticker
	 *
	 * @var int
	 */
	public $id;

	/**
	 * name of the sticker
	 *
	 * @var string
	 */
	public $name;

	/**
	 * for standard stickers, id of the pack the sticker is from
	 *
	 * @var int
	 */
	public $pack_id;

	/**
	 * the standard sticker's sort order within its pack
	 *
	 * @var int
	 */
	public $sort_value;

	/**
	 * autocomplete/suggestion tags for the sticker (max 200 characters)
	 *
	 * @var string
	 */
	public $tags;

	/**
	 * type of sticker
	 *
	 * @var int
	 */
	public $type;

	/**
	 * the user that uploaded the guild sticker
	 *
	 * @var array
	 */
	public $user;

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