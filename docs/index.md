---
title: RestCord 0.9
---

# RestCord 0.9

RestCord is a PHP client for Discord's REST API v10. It sends REST requests and does not connect to the Discord Gateway.

The generated clients come from Discord's [official OpenAPI specification](https://github.com/discord/discord-api-spec). Use Discord's [API reference](https://docs.discord.com/developers/reference) for endpoint rules and payload fields.

## Install

RestCord 0.9 requires PHP 8.3 or newer.

```shell
composer require restcord/restcord:^0.9
```

Load Composer's autoloader before you create the client.

```php
<?php

require __DIR__.'/../vendor/autoload.php';

use RestCord\DiscordClient;

$token = getenv('DISCORD_BOT_TOKEN') ?: throw new RuntimeException('DISCORD_BOT_TOKEN is not set.');

$discord = new DiscordClient([
    'token' => $token,
]);
```

You can omit `token` for endpoints that Discord permits without authentication. Set `tokenType` to `OAuth` for an OAuth2 bearer token.

## Call an operation

Access operations through their generated category property. Common resource categories use plural names such as `channels`, `guilds`, `users`, and `webhooks`.

The complete category set is:

```text
applications, channels, gateway, guilds, interactions, invites, lobbies,
oauth2, partnerSdk, skus, soundboardDefaultSounds, stageInstances,
stickerPacks, stickers, users, voice, webhooks
```

All operation methods accept one options array. Use underscore keys for path, query, and header parameters.

```php
$guild = $discord->guilds->getGuild([
    'guild_id' => '81384788765712384',
    'with_counts' => true,
]);
```

Put JSON and multipart payload fields under `body`.

```php
$message = $discord->channels->createMessage([
    'channel_id' => '81384788765712384',
    'body' => [
        'content' => 'Hello from RestCord.',
    ],
]);
```

Each sync method has an `Async` method with the same options. The async method returns a Guzzle `PromiseInterface`.

```php
$promise = $discord->guilds->getGuildAsync([
    'guild_id' => '81384788765712384',
]);

$guild = $promise->wait();
```

Successful calls return one of these values:

- JSON responses become decoded PHP arrays or scalar values.
- File responses return a PSR-7 `StreamInterface`.
- Empty responses return `null`.

## Client options

| Option | Type | Default | Purpose |
| --- | --- | --- | --- |
| `token` | `?string` | `null` | Discord bot or OAuth2 token. |
| `tokenType` | `string` | `Bot` | Authorization type: `Bot` or `OAuth`. |
| `logger` | `Psr\Log\LoggerInterface` | `NullLogger` | Request status and rate-limit warning logger. |
| `guzzleOptions` | `array` | `[]` | Safe Guzzle request options, such as timeouts. |
| `middleware` | `array` | `[]` | Callable Guzzle middleware entries. |
| `rateLimitProvider` | `RateLimitProviderInterface` | `MemoryRateLimitProvider` | Stores Discord rate-limit state. |
| `throwOnRatelimit` | `bool` | `false` | Throw instead of waiting or retrying after a rate limit. |
| `httpHandler` | `?callable` | `null` | Custom Guzzle transport handler. |
| `globalRateLimit` | `int` | `50` | Maximum bot requests reserved per rolling second. |

`guzzleOptions` cannot replace `base_uri`, `handler`, `headers`, `auth`, or `http_errors`. RestCord owns these settings.

## Rate limits

The default `MemoryRateLimitProvider` coordinates one PHP process. It tracks route buckets and the global allowance in memory.

Use `RedisRateLimitProvider` when workers must share rate-limit state. It requires the PHP Redis extension and uses Redis server time for atomic reservations.

Clients that share a bot token must use the same Redis prefix. Anonymous clients behind one egress IP must also share a prefix.

The provider accepts `prefix`, `host`, `port`, and a connected `Redis` instance through `client`.

```php
use RestCord\RateLimit\Provider\RedisRateLimitProvider;

$discord = new DiscordClient([
    'token' => $token,
    'rateLimitProvider' => new RedisRateLimitProvider([
        'host' => 'redis',
        'port' => 6379,
        'prefix' => 'restcord.ratelimit.',
    ]),
]);
```

By default, RestCord waits for known capacity and retries a Discord `429` response up to three times. Set `throwOnRatelimit` to `true` to receive `RatelimitException` without that wait or retry.

Redis failures are fail closed. A reservation failure blocks the request before Discord receives it. A failed response update preserves the Discord response. RestCord blocks later requests through the known reset window and until a Redis reservation succeeds.

Interaction routes do not count against the bot global allowance. Read Discord's [rate-limit documentation](https://docs.discord.com/developers/topics/rate-limits) before you change `globalRateLimit`.

## Errors and migration

`DiscordRequestException` includes Discord's HTTP status, error code, message, error details, and PSR-7 response. Rate-limit failures use `RatelimitException` or `RateLimitStorageException`.

See the [examples](examples.md) for JSON, async, stream, and Redis calls. Users upgrading from an older RestCord release should follow the [0.9 migration map](migration-0.9.md).
