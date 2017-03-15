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

namespace RestCord\Model\User;

/**
 * Connection Model.
 */
class Connection
{
    /**
     * id of the connection account.
     *
     * @var string
     */
    public $id;

    /**
     * an array of partial server integrations.
     *
     * @var array
     */
    public $integrations;

    /**
     * the username of the connection account.
     *
     * @var string
     */
    public $name;

    /**
     * whether the connection is revoked.
     *
     * @var bool
     */
    public $revoked = false;

    /**
     * the service of the connection (twitch, youtube).
     *
     * @var string
     */
    public $type;

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
