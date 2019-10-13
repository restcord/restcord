---
title: Add Guild Member
category: Guild
order: 10
---

# `addGuildMember`

```php
$client->guild->addGuildMember($parameters);
```

## Description

Adds a user to the guild, provided you have a valid oauth2 access token for the user with the guilds.join scope.  Fires a Guild Member Add Gateway event. Requires the bot to have the CREATE_INSTANT_INVITE permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*
access_token | string | false | *null*
nick | string | false | *null*
roles | array | false | *null*
mute | boolean | false | *null*
deaf | boolean | false | *null*

## Response

Returns a 201 Created with the guild member as the body, or 204 No Content if the user is already a member of the guild.

Can Return:

* guild member
