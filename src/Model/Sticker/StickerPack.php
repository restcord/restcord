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
 * StickerPack Model
 */
class StickerPack {

	/**
	 * id of the sticker pack's banner image
	 *
	 * @var int
	 */
	public $banner_asset_id;

	/**
	 * id of a sticker in the pack which is shown as the pack's icon
	 *
	 * @var int
	 */
	public $cover_sticker_id;

	/**
	 * description of the sticker (2-100 characters)
	 *
	 * @var string
	 */
	public $description;

	/**
	 * the sticker file to upload, must be a PNG, APNG, or Lottie JSON file, max 500 KB
	 *
	 * @var file contents
	 */
	public $file;

	/**
	 * id of the sticker pack
	 *
	 * @var int
	 */
	public $id;

	/**
	 * name of the sticker (2-30 characters)
	 *
	 * @var string
	 */
	public $name;

	/**
	 * id of the pack's SKU
	 *
	 * @var int
	 */
	public $sku_id;

	/**
	 * @var array
	 */
	public $sticker_packs;

	/**
	 * the stickers in the pack
	 *
	 * @var array
	 */
	public $stickers;

	/**
	 * autocomplete/suggestion tags for the sticker (max 200 characters)
	 *
	 * @var string
	 */
	public $tags;

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