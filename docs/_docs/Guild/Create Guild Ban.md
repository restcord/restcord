---
title: Create Guild Ban
category: Guild
order: 18
---

# `createGuildBan`

```php
$client->guild->createGuildBan($parameters);
```

## Description

Create a guild ban, and optionally delete previous messages sent by the banned user. Requires the BAN_MEMBERS permission.  Fires a Guild Ban Add Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*
delete-message-days? | integer | false | *null*
reason? | string | false | *null*

## Response

Returns a 204 empty response on success.

