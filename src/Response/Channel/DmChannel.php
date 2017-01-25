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
 * DmChannel Response class.
 */
class DmChannel
{
    /**
     * @var int The id of this private message
     */
    public $id;

    /**
     * @var bool Should always be true for DM channels
     */
    public $is_private;

    /**
     * @var int The id of the last message sent in this DM
     */
    public $last_message_id;

    /**
     * @var array The user object of the DM recipient
     */
    public $recipient;
}
