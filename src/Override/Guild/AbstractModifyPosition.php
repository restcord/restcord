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

namespace RestCord\Override\Guild;

use GuzzleHttp\RequestOptions;
use ReflectionClass;
use RestCord\OverriddenGuzzleClient;
use RestCord\Override\OverrideInterface;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * AbstractModifyPosition Class
 */
abstract class AbstractModifyPosition implements OverrideInterface
{
    /**
     * {@inheritdoc}
     */
    public static function run(OverriddenGuzzleClient $client, array $args, $async = false)
    {
        $operation = $client->getDescription()->getOperation(
            lcfirst((new ReflectionClass(static::class))->getShortName())
        );
        $uri = str_replace('{guild.id}', $args[0]['guild.id'], $operation->getUri());

        foreach ($args as $x => $arg) {
            unset($args[$x]['guild.id']);
        }

        return $client->getHttpClient()->{$async ? 'requestAsync' : 'request'}(
            $operation->getHttpMethod(),
            $uri,
            [RequestOptions::JSON => $args]
        );
    }
}
