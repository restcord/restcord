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

namespace RestCord\Response\Channel;

/**
 * Reaction Response class.
 */
class Reaction
{
    /**
     * @var int Times this emoji has been used to react
     */
    public $count;

    /**
     * @var array Emoji information
     */
    public $emoji;

    /**
     * @var bool Whether the current user reacted using this emoji
     */
    public $me;
}
