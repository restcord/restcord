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

namespace RestCord\Response\User;

/**
 * UserGuild Response class.
 */
class UserGuild
{
    /**
     * @var string Guild.icon
     */
    public $icon;

    /**
     * @var int Guild.id
     */
    public $id;

    /**
     * @var string Guild.name
     */
    public $name;

    /**
     * @var bool True if the user is an owner of the guild
     */
    public $owner;

    /**
     * @var int Bitwise of the user's enabled/disabled permissions
     */
    public $permissions;
}
