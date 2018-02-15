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
 * SplashTrait Class
 */
trait SplashTrait
{
    public function getSplash($format = 'webp', $size = null)
    {
        $url = Constants::AVATAR_URL.$this->id.'/'.$this->splash.'.'.$format;
        if ($size !== null) {
            $url .= '?size='.$size;
        }

        return $url;
    }
}
