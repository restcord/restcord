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

namespace RestCord\Mock;

use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Invite extends GuzzleClient
{
    /**
     * @param array $options invite.code
     *
     * @return array
     */
    public function getInvite(array $options)
    {
        return $options;
    }

    /**
     * @param array $options invite.code
     *
     * @return array
     */
    public function deleteInvite(array $options)
    {
        return $options;
    }

    /**
     * @param array $options invite.code
     *
     * @return array
     */
    public function acceptInvite(array $options)
    {
        return $options;
    }
}
