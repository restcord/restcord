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

class Oauth2 extends GuzzleClient
{
    /**
     * @param array $options id, name, icon, description, rpc_origins?, bot_public, bot_requires_code_grant, owner
     *
     * @return array
     */
    public function getCurrentApplicationInformation(array $options)
    {
        return $options;
    }
}
