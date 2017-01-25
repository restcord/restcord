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

namespace RestCord\Response\Guild;

/**
 * UnavailableGuild Response class.
 */
class UnavailableGuild
{
    /**
     * @var int Guild id
     */
    public $id;

    /**
     * @var bool Should always be true
     */
    public $unavailable;
}
