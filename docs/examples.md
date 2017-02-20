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

var_dump($discord->channel->createMessage(['channel.id' => 81384788765712384, 'content' => 'Foo Bar Baz']));
var_dump(
    $client->channel->createMessage([
         'channel.id' => $channelId,
         'content'    => "this `supports` __a__ **subset** *of* ~~markdown~~ 😃 ```js
 function foo(bar) {
   console.log(bar);
 }
 
 foo(1);```",
         'embed'      => [
             "title" => "title ~~(did you know you can have markdown here too?)~~",
             "description" => "this supports [named links](https://discordapp.com) on top of the previously shown subset of markdown. ```\nyes, even code blocks```",
             "url" => "https://discordapp.com",
             "color" => 14290439,
             "timestamp" => "2017-02-20T18:05:58.512Z",
             "footer" => [
                 "icon_url" => "https://cdn.discordapp.com/embed/avatars/0.png",
                 "text" => "footer text"
             ],
             "thumbnail" => [
                 "url" => "https://cdn.discordapp.com/embed/avatars/0.png"
             ],
             "image" => [
                 "url" => "https://cdn.discordapp.com/embed/avatars/0.png"
             ],
             "author" => [
                 "name" => "author name",
                 "url" => "https://discordapp.com",
                 "icon_url" => "https://cdn.discordapp.com/embed/avatars/0.png"
             ],
             "fields" => [
                 [
                     "name" => "Foo",
                     "value" => "some of these properties have certain limits..."
                 ],
                 [
                     "name" => "Bar",
                     "value" => "try exceeding some of them!"
                 ],
                 [
                     "name" => " 😃",
                     "value" => "an informative error should show up, and this view will remain as-is until all issues are fixed"
                 ],
                 [
                     "name" => "<:thonkang:219069250692841473>",
                     "value" => "???"
                 ]
             ]
         ]
     ])
 );
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
