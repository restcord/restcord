---
title: RestCord - PHP Edition
---

[![GitHub release](https://img.shields.io/github/release/restcord/restcord.svg)](https://www.github.com/restcord/restcord) [![Build Status](https://travis-ci.org/restcord/restcord.svg?branch=master)](https://travis-ci.org/restcord/restcord) [![Discord Chat](https://img.shields.io/badge/chat-Discord%20API-blue.svg)](https://discord.gg/sxeztzU) [![StyleCI](https://styleci.io/repos/79310512/shield?branch=master)](https://styleci.io/repos/79310512)

What is this?
------------

This is a PHP library for the Discord API. This library is limited to the basic REST api that Discord provides.
If you are doing anything heavy, or fancy, you should probably look at [the other php library][1].
 
 
FAQ
---

1. Can I run RestCord on a webserver (e.g. Apache, nginx)?
    - Yes. There are caveats though. Some of the requests aren't super fast, and can slow down your users responses. You should cache as much as you can.
2. Can I use this to create a bot?
    - Yes, but not the typical kind. This does not spawn a long running process, or connect to the websocket gateway like the other lib does.
3. It wont let me send messages. Whats up?
    - You have to have your bot connect to the websocket gateway at LEAST once before you can create messages. You can do that by
    opening up `./extra/gateway.html` in your browser.

Getting Started
---------------

### Installing

RestCord is installed using [Composer](https://getcomposer.org). Make sure you have installed Composer and are used to how it operates.
We require a minimum PHP version of PHP 7.0, but suggest keeping up with the current active versions of PHP: https://www.php.net/supported-versions.php
This library REQUIRES 64bit PHP.

This library has not been tested with HHVM.

1. Run `composer require restcord/restcord`. This will install the lastest release.
	- If you would like, you can also install the development branch by running `composer require restcord/restcord dev-master`.
2. Include the Composer autoload file at the top of your main file:
	- `include __DIR__.'/vendor/autoload.php';`
3. Use it!

Getting Started
---------------

There's an example below, and more listed in the menu to the left. The `RestCord\DiscordClient` is broken out into 
categories just like the api itself: channel, gateway, guild, invite, oauth2, user, voice, and webhook.

You can view the methods of each of these categories by selecting the menu items on the left.


Basic Example
-------------

```php
<?php

include __DIR__.'/vendor/autoload.php';

use RestCord\DiscordClient;

$discord = new DiscordClient(['token' => 'bot-token']); // Token is required

var_dump($discord->guild->getGuild(['guild.id' => 81384788765712384]));

```

## Options

Below is a table of the options available to the discord client

Name | Type | Required | Default | Description
--- | --- | --- | --- | ---
token | string | Yes | ~ | Your bot token
version | string | No | `1.0.0` | The version of the API to use. Should probably be left alone
logger | Monolog\Logger | false | `new Logger('Logger')` | An instance of a Monolog\Logger
throwOnRatelimit | bool | false | `false` | Whether or not an exception is thrown when a ratelimit is supposed to hit
apiUrl | string | false | `https://discordapp.com/api/v6` | Should leave this alone.
tokenType | string | false | `Bot` | Either `Bot` or `OAuth`
 
## API Documentation

API Documentation can be found in the menu to the left

## Contributing

We are open to contributions. However, please make sure you follow our coding standards (PSR-4 autoloading and custom styling).
We use StyleCI to format our code. Contributing is a little strange with this library. We use [a service definition generator][2]
to create a service description for guzzle. All of the logic in this repo is built off of the service description in the
src/Resources directory.

To build a new service definition, just run:

```bash
$ ./bin/downloadServiceDefinition <version number>
```

To build new docs, run:

```bash
$ ./bin/buildDocs <version number>
```

## Wrappers

* [Laravel][3]
 
*Yes, I stole some of my docs from DiscordPHP* 
 
[1]: https://github.com/teamreflex/DiscordPHP
[2]: https://github.com/aequasi/discord-service-definition-generator
[3]: https://gitlab.com/more-cores/laravel-restcord
