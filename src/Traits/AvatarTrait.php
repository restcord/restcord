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
 * AvatarTrait Class
 */
trait AvatarTrait
{
    public function getAvatar($format = 'webp', $size = null)
    {
        // Default User Avatar
        $url = Constants::CDN_URL.'embed/avatars/'.($this->discriminator % 5).'.png';

        // Check if User has Avatar
        if ($this->avatar)
        {
            if (strpos($this->avatar, 'a_') === 0) {
                $format = 'gif';
            }

            // User Avatar
            $url = Constants::AVATAR_URL.$this->id.'/'.$this->avatar.'.'.$format;
            if ($size !== null) {
                $url .= '?size='.$size;
            }
        }

        return $url;
    }
}
