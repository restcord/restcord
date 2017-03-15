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

namespace RestCord\Model\Invite;

/**
 * InviteGuild Model.
 */
class InviteGuild
{
    /**
     * hash of the guild icon (or null).
     *
     * @var string
     */
    public $icon;

    /**
     * id of the guild.
     *
     * @var int
     */
    public $id;

    /**
     * name of the guild.
     *
     * @var string
     */
    public $name;

    /**
     * hash of the guild splash (or null).
     *
     * @var string
     */
    public $splash;

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
