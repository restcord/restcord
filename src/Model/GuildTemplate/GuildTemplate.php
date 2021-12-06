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

namespace RestCord\Model\GuildTemplate;

/**
 * GuildTemplate Model
 */
class GuildTemplate {

	/**
	 * the template code (unique ID)
	 *
	 * @var string
	 */
	public $code;

	/**
	 * when this template was created
	 *
	 * @var \DateTimeImmutable
	 */
	public $created_at;

	/**
	 * the user who created the template
	 *
	 * @var array
	 */
	public $creator;

	/**
	 * the ID of the user who created the template
	 *
	 * @var int
	 */
	public $creator_id;

	/**
	 * description for the template (0-120 characters)
	 *
	 * @var string
	 */
	public $description;

	/**
	 * base64 128x128 image for the guild icon
	 *
	 * @var image data
	 */
	public $icon;

	/**
	 * whether the template has unsynced changes
	 *
	 * @var bool
	 */
	public $is_dirty = false;

	/**
	 * name of the template (1-100 characters)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * the guild snapshot this template contains
	 *
	 * @var array
	 */
	public $serialized_source_guild;

	/**
	 * the ID of the guild this template is based on
	 *
	 * @var int
	 */
	public $source_guild_id;

	/**
	 * when this template was last synced to the source guild
	 *
	 * @var \DateTimeImmutable
	 */
	public $updated_at;

	/**
	 * number of times this template has been used
	 *
	 * @var int
	 */
	public $usage_count;

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