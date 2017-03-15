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

namespace RestCord\Model\Channel;

/**
 * GuildChannel Model.
 */
class GuildChannel
{
    /**
     * the bitrate (in bits) of the voice channel.
     *
     * @var int
     */
    public $bitrate;

    /**
     * the id of the guild.
     *
     * @var int
     */
    public $guild_id;

    /**
     * the id of this channel (will be equal to the guild if it's the "general" channel).
     *
     * @var int
     */
    public $id;

    /**
     * should always be false for guild channels.
     *
     * @var bool
     */
    public $is_private = false;

    /**
     * the id of the last message sent in this channel.
     *
     * @var int
     */
    public $last_message_id;

    /**
     * the name of the channel (2-100 characters).
     *
     * @var string
     */
    public $name;

    /**
     * an array of overwrite objects.
     *
     * @var \RestCord\Model\Channel\Overwrite[]
     */
    public $permission_overwrites;

    /**
     * sorting position of the channel.
     *
     * @var int
     */
    public $position;

    /**
     * the channel topic (0-1024 characters).
     *
     * @var string
     */
    public $topic;

    /**
     * "text" or "voice".
     *
     * @var string
     */
    public $type;

    /**
     * the user limit of the voice channel.
     *
     * @var int
     */
    public $user_limit;

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
