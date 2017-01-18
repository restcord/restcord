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

require __DIR__.'/../vendor/autoload.php';

use Assert\Assertion;
use RestCord\DiscordClient;

$client = new DiscordClient(
    [
        'token'            => $argv[1],
        'throwOnRatelimit' => true,
    ]
);

/** @var \GuzzleHttp\Command\Result $guild */
$guild = $client->guild->getGuild(['guild.id' => (int) $argv[2]]);

Assertion::eq(108432868149035008, $guild['owner_id']);

try {
    for ($i = 0; $i < 15; $i++) {
        $client->channel->createMessage(
            [
                'channel.id' => (int) $argv[3],
                'content'    => 'Test Message from travis',
            ]
        );
    }
} catch (\GuzzleHttp\Command\Exception\CommandException $e) {
    Assertion::true($e->getPrevious() instanceof \RestCord\RateLimit\RatelimitException);
}
