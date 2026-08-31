---
title: RestCord 0.9 examples
---

# RestCord 0.9 examples

These examples use PHP 8.3 or newer and RestCord `^0.9`.

## Create a client

```php
<?php

require __DIR__.'/../vendor/autoload.php';

use RestCord\DiscordClient;

$token = getenv('DISCORD_BOT_TOKEN') ?: throw new RuntimeException('DISCORD_BOT_TOKEN is not set.');

$discord = new DiscordClient([
    'token' => $token,
]);
```

## Read a JSON response

`getGuild()` returns a decoded array. Path and query parameters use underscore keys.

```php
$guild = $discord->guilds->getGuild([
    'guild_id' => '81384788765712384',
    'with_counts' => true,
]);

echo $guild['name'];
```

Discord documents this operation under [Get Guild](https://docs.discord.com/developers/resources/guild#get-guild).

## Send a JSON body

Put the endpoint payload in `body`. Keep path parameters at the top level.

```php
$message = $discord->channels->createMessage([
    'channel_id' => '81384788765712384',
    'body' => [
        'content' => 'Hello from RestCord.',
        'allowed_mentions' => [
            'parse' => [],
        ],
    ],
]);
```

See Discord's [Create Message](https://docs.discord.com/developers/resources/message#create-message) documentation for supported body fields.

## Run calls concurrently

Each generated method has an `Async` pair. `Utils::all()` waits for both promises and preserves their results.

```php
use GuzzleHttp\Promise\Utils;

[$guild, $roles] = Utils::all([
    $discord->guilds->getGuildAsync([
        'guild_id' => '81384788765712384',
    ]),
    $discord->guilds->listGuildRolesAsync([
        'guild_id' => '81384788765712384',
    ]),
])->wait();
```

## Handle empty and file responses

Methods return `null` when Discord sends an empty success response.

```php
$result = $discord->channels->deleteMessage([
    'channel_id' => '81384788765712384',
    'message_id' => '112233445566778899',
    'audit_log_reason' => 'Removed duplicate message',
]);

assert($result === null);
```

File responses return a PSR-7 stream.

```php
$png = $discord->guilds->getGuildWidgetPng([
    'guild_id' => '81384788765712384',
]);

file_put_contents(__DIR__.'/widget.png', $png->getContents());
```

## Share rate limits through Redis

The default memory provider coordinates one PHP process. Use Redis when several workers share a bot token or anonymous clients share an egress IP.

```php
use RestCord\DiscordClient;
use RestCord\RateLimit\Provider\RedisRateLimitProvider;

$rateLimits = new RedisRateLimitProvider([
    'host' => 'redis',
    'port' => 6379,
    'prefix' => 'restcord.ratelimit.',
]);

$discord = new DiscordClient([
    'token' => $token,
    'rateLimitProvider' => $rateLimits,
]);
```

Install the PHP Redis extension. Enable it before you create `RedisRateLimitProvider`. All processes that share a token must use the same Redis prefix. Anonymous clients behind one egress IP must also share that prefix.

Redis failures are fail closed. A reservation failure blocks the request before Discord receives it. A failed response update preserves the Discord response. RestCord blocks later requests through the known reset window and until a Redis reservation succeeds.

Read the [0.9 migration map](migration-0.9.md) when converting calls from an older release. Discord's [API reference](https://docs.discord.com/developers/reference) and [rate-limit documentation](https://docs.discord.com/developers/topics/rate-limits) define current endpoint behavior.
