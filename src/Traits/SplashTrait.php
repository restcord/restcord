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
 * SplashTrait Class
 */
trait SplashTrait
{
    /**
     * {@inheritDoc}
     */
    public $splash;

    /**
     * {@inheritDoc}
     */
    public $id;

    public function getSplash($format = 'webp', $size = null)
    {
        $url = Constants::AVATAR_URL . $this->id . '/' . $this->splash . '.' . $format;
        if ($size !== null) {
            $url .= "?size=" . $size;
        }

        return $url;
    }
}
