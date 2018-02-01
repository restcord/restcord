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
 * IconTrait Class
 */
trait IconTrait
{
    /**
     * {@inheritDoc}
     */
    public $icon;

    /**
     * {@inheritDoc}
     */
    public $id;

    public function getIcon($format = 'webp', $size = null)
    {
        $url = Constants::AVATAR_URL . $this->id . '/' . $this->icon . '.' . $format;
        if ($size !== null) {
            $url .= "?size=" . $size;
        }

        return $url;
    }
}
