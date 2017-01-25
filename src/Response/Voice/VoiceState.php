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

namespace RestCord\Response\Voice;

/**
 * VoiceState Response class.
 */
class VoiceState
{
    /**
     * @var int The channel id this user is connected to
     */
    public $channel_id;

    /**
     * @var bool Whether this user is deafened by the server
     */
    public $deaf;

    /**
     * @var int|null The guild id this voice state is for
     */
    public $guild_id;

    /**
     * @var bool Whether this user is muted by the server
     */
    public $mute;

    /**
     * @var bool Whether this user is locally deafened
     */
    public $self_deaf;

    /**
     * @var bool Whether this user is locally muted
     */
    public $self_mute;

    /**
     * @var string The session id for this voice state
     */
    public $session_id;

    /**
     * @var bool Whether this user is muted by the current user
     */
    public $suppress;

    /**
     * @var int The user id this voice state is for
     */
    public $user_id;
}
