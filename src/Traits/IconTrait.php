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

namespace RestCord\Traits;

use RestCord\Constants;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * IconTrait Class
 */
trait IconTrait
{
    public function getIcon($format = 'webp', $size = null)
    {
        // Add const SERVER_URL = self::CDN_URL.'icons/'; to the Constants.php
        $url = "https://cdn.discordapp.com/icons/".$this->id.'/'.$this->icon.'.'.$format;
        if ($size !== null) {
            $url .= '?size='.$size;
        }

        return $url;
    }
}
