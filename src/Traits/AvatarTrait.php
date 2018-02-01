<?php

/*
 * This file is part of php-restcord.
 *
 * (c) Aaron Scherer <aequasi@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
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
    /**
     * {@inheritDoc}
     */
    public $avatar;

    /**
     * {@inheritDoc}
     */
    public $id;

    public function getAvatar($format = 'webp', $size = null)
    {
        if (strpos($this->avatar, 'a_') === 0) {
            $format = 'gif';
        }

        $url = Constants::AVATAR_URL . $this->id . '/' . $this->avatar . '.' . $format;
        if ($size !== null) {
            $url .= "?size=" . $size;
        }

        return $url;
    }
}
