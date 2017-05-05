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

namespace RestCord\Override;

use RestCord\OverriddenGuzzleClient;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * OverrideInterface Class
 */
interface OverrideInterface
{
    /**
     * @param OverriddenGuzzleClient $client
     * @param array                  $args
     * @param bool                   $async
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function run(OverriddenGuzzleClient $client, array $args, $async = false);
}
