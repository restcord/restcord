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

namespace RestCord\Response\Invite;

/**
 * InviteGuild Response class.
 */
class InviteGuild
{
    /**
     * @var string Hash of the guild icon (or null)
     */
    public $icon;

    /**
     * @var int Id of the guild
     */
    public $id;

    /**
     * @var string Name of the guild
     */
    public $name;

    /**
     * @var string Hash of the guild splash (or null)
     */
    public $splash;
}
