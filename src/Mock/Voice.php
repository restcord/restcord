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

class Voice extends GuzzleClient
{
    /**
     * @param array $options
     *
     * @return array
     */
    public function listVoiceRegions(array $options)
    {
        return $options;
    }
}
