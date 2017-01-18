RESTCord - PHP Edition
======================

[![Discord Chat](https://img.shields.io/badge/chat-Discord%20API-blue.svg)](https://discord.gg/0SBTUU1wZTX4Mjwn)

What is this?
------------

This is a PHP library for the Discord API. This library is limited to the basic REST api that Discord provides.
If you are doing anything heavy, or fancy, you should probably look at [the other php library][1].
 
 
FAQ
---

1. Can I run DiscordPHP on a webserver (e.g. Apache, nginx)?
    - Yes. There are caveats though. Some of the requests aren't super fast, and can slow down your users responses. You should cache as much as you can.
    
Getting Started
---------------

### Installing

RESTCord is installed using [Composer](https://getcomposer.org). Make sure you have installed Composer and are used to how it operates. We require a minimum PHP version of PHP 7.0.0, however it is recomended that you use PHP 7.1. 

This library has not been tested with HHVM.

1. Run `composer require restcord/restcord`. This will install the lastest release.
	- If you would like, you can also install the development branch by running `composer require restcord/restcord dev-develop`.
2. Include the Composer autoload file at the top of your main file:
	- `include __DIR__.'/vendor/autoload.php';`
3. Use it!

Basic Example
-------------

```php
<?php

include __DIR__.'/vendor/autoload.php';

use Restcord\DiscordClient;

$discord = new DiscordClient(['token' => 'bot-token']);

var_dump($discord->guild->getGuild(['guild.id' => 108439985920704512]));
```
 
## Documentation

Raw documentation can be found in the [`docs`](./docs) directory.

## Contributing

We are open to contributions. However, please make sure you follow our coding standards (PSR-4 autoloading and custom styling). We use StyleCI to format our code.
 
*Yes, I stole some of my docs from DiscordPHP* 
 
[1]: https://github.com/teamreflex/DiscordPHP
