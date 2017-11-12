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

set_error_handler(
    function ($severity, $message, $file, $line) {
        if (error_reporting() & $severity) {
            throw new ErrorException($message, 0, $severity, $file, $line);
        }
    }
);

use Assert\Assertion;
use RestCord\DiscordClient;

$client = new DiscordClient(
    [
        'token'            => $argv[1],
        'throwOnRatelimit' => true,
        'cacheDir'         => __DIR__.'/../cache',
        'logger'           => new \Psr\Log\NullLogger(),
    ]
);

$client->guild->modifyGuildChannelPositions(
    [['guild.id' => 146037311753289737, 'id' => 146037311753289737, 'position' => 10]]
);
$client->guild->modifyGuildChannelPositions(
    [['guild.id' => 146037311753289737, 'id' => 146037311753289737, 'position' => 0]]
);

$invite = $client->channel->createChannelInvite(
    [
        'channel.id' => (int) $argv[2],
        'max_age'    => 5,
        'max_uses'   => 1,
        'unique'     => true,
        'temporary'  => false,
    ]
);

$guild = $client->guild->getGuild(['guild.id' => (int) $argv[2]]);
Assertion::eq(108432868149035008, $guild->owner_id);

$user = $client->user->getUser(['user.id' => (int) $guild->owner_id]);
Assertion::eq(7079, $user->discriminator);

$client->guild->updateNick(
    [
        'guild.id' => (int) $argv[2],
        'nick'     => 'Build at: '.time(),
    ]
);

$users = $client->guild->listGuildMembers(['guild.id' => 146037311753289737, 'limit' => 25]);
Assertion::eq(108432868149035008, $users[0]->user->id);

$role = $client->guild->createGuildRole(['guild.id' => 146037311753289737, 'name' => 'Test Role']);
Assertion::eq('Test Role', $role->name);
$roles = $client->guild->modifyGuildRolePositions(
    [['guild.id' => 146037311753289737, 'id' => $role->id, 'position' => 5]]
);
foreach ($roles as $r) {
    if ((int) $r->id === $role->id) {
        Assertion::eq(5, $r->position);
    }
}

$response = $client->guild->deleteGuildRole(['guild.id' => 146037311753289737, 'role.id' => $role->id]);

$channels = $client->guild->getGuildChannels(['guild.id' => 146037311753289737]);
Assertion::eq(count($channels), 9);

/** @var \GuzzleHttp\Command\Result $response */
$response = $client->webhook->executeWebhook(
    [
        'webhook.id'    => 282261441090813952,
        'webhook.token' => 'NQY9-DzLRT0Sst7Ri5bTsjD3F5cby69PYNXcmbzXYubPbY1KQSQxbGrLIjvMJXcdEBcp',
        'username'      => 'RestCord',
        'embeds'        => [
            ['title' => 'RestCord test at: '.date('Y-m-d H:i:s')],
        ],
    ]
);
Assertion::eq($response->count(), 0);

$dm = $client->user->createDm(['recipient_id' => 108432868149035008]);
$client->channel->createMessage(
    [
        'channel.id' => $dm->id,
        'embed'      => [
            'title' => 'RestCord test at: '.date(
                    'Y-m-d H:i:s'
                ),
        ],
    ]
);
