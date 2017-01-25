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

namespace RestCord\Response\Webhook;

/**
 * Webhook Response class.
 */
class Webhook
{
    /**
     * @var string|null The default avatar of the webhook
     */
    public $avatar;

    /**
     * @var int The channel id this webhook is for
     */
    public $channel_id;

    /**
     * @var int|null The guild id this webhook is for
     */
    public $guild_id;

    /**
     * @var int The id of the webhook
     */
    public $id;

    /**
     * @var string|null The default name of the webhook
     */
    public $name;

    /**
     * @var string The secure token of the webhook
     */
    public $token;

    /**
     * @var array|null The user this webhook was created by (not returned when getting a webhook with its token)
     */
    public $user;
}
