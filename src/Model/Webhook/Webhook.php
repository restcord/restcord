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

namespace RestCord\Model\Webhook;

/**
 * Webhook Model.
 */
class Webhook
{
    /**
     * the default avatar of the webhook.
     *
     * @var string
     */
    public $avatar;

    /**
     * the channel id this webhook is for.
     *
     * @var int
     */
    public $channel_id;

    /**
     * the guild id this webhook is for.
     *
     * @var int
     */
    public $guild_id;

    /**
     * the id of the webhook.
     *
     * @var int
     */
    public $id;

    /**
     * the default name of the webhook.
     *
     * @var string
     */
    public $name;

    /**
     * the secure token of the webhook.
     *
     * @var string
     */
    public $token;

    /**
     * the user this webhook was created by (not returned when getting a webhook with its token).
     *
     * @var User
     */
    public $user;

    /**
     * @param array $content
     */
    public function __construct(array $content = null)
    {
        if (null === $content) {
            return;
        }

        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
