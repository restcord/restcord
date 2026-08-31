# RestCord

[![CI](https://github.com/restcord/restcord/actions/workflows/ci.yml/badge.svg?branch=develop)](https://github.com/restcord/restcord/actions/workflows/ci.yml) [![Latest Stable Version](https://img.shields.io/packagist/v/restcord/restcord.svg)](https://packagist.org/packages/restcord/restcord) [![PHP Version](https://img.shields.io/packagist/php-v/restcord/restcord.svg)](https://packagist.org/packages/restcord/restcord) [![License](https://img.shields.io/packagist/l/restcord/restcord.svg)](LICENSE)

RestCord is a PHP client for Discord's REST API v10. It uses clients generated from Discord's [official OpenAPI specification](https://github.com/discord/discord-api-spec). RestCord does not connect to the Discord Gateway.

RestCord 0.9 requires PHP 8.3 or newer.

## Install

```shell
composer require restcord/restcord:^0.9
```

## Use

```php
<?php

require __DIR__.'/vendor/autoload.php';

use RestCord\DiscordClient;

$token = getenv('DISCORD_BOT_TOKEN') ?: throw new RuntimeException('DISCORD_BOT_TOKEN is not set.');

$discord = new DiscordClient([
    'token' => $token,
]);

$guild = $discord->guilds->getGuild([
    'guild_id' => '81384788765712384',
]);
```

Methods use underscore option keys and place request payloads under `body`. Each sync method has an `Async` pair. Calls return decoded arrays, PSR-7 streams, or `null`.

The in-memory rate limiter is the default. Use `RedisRateLimitProvider` when several PHP processes must share Discord rate-limit state.

Read the [documentation](docs/index.md), [examples](docs/examples.md), and [0.9 migration map](docs/migration-0.9.md). Discord's [API reference](https://docs.discord.com/developers/reference) and [rate-limit documentation](https://docs.discord.com/developers/topics/rate-limits) define endpoint behavior.
