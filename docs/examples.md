---
title: Examples
---

---

Basic Example
-------------

This example just creates a client, and grabs a guild object by ID.

```php
<?php

include __DIR__.'/vendor/autoload.php';

use RestCord\DiscordClient;

$discord = new DiscordClient(['token' => 'bot-token']); // Token is required

var_dump($discord->guild->getGuild(['guild.id' => 81384788765712384]));
```

---

Send Message
------------

In order to send a message, your bot needs to have connected to Discords websocket gateway at least once.
This is not something you can do with this library. 

```php
<?php

include __DIR__.'/vendor/autoload.php';

use RestCord\DiscordClient;

$discord = new DiscordClient(['token' => 'bot-token']); // Token is required

var_dump($discord->guild->getGuild(['guild.id' => 81384788765712384]));
```

---

Get Guild Roles
---------------

This fetches the roles of a guild.

```php
<?php

include __DIR__.'/vendor/autoload.php';

use RestCord\DiscordClient;

$discord = new DiscordClient(['token' => 'bot-token']); // Token is required

var_dump($discord->guild->getGuildRoles(['guild.id' => 81384788765712384]));
```
