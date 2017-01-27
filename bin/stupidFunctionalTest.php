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

$guild = $client->guild->getGuild(['guild.id' => (int) $argv[2]]);

Assertion::eq(108432868149035008, $guild['owner_id']);

$user = $client->user->getUser(['user.id' => (int) $guild['owner_id']]);
Assertion::eq(7079, $user['discriminator']);

$client->guild->updateNick(
    [
        'guild.id' => (int) $argv[2],

        'nick'     => 'Build at: '.time(),
    ]
);

$users = $client->guild->listGuildMembers(['guild.id' => 146037311753289737, 'limit' => 3]);
Assertion::eq(108432868149035008, $users[0]['user']['id']);
dump(count($users));
