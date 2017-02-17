---
title: Create Guild Channel
category: Guild
order: 6
---

# `createGuildChannel`

```php
$client->guild->createGuildChannel($parameters);
```

## Description

Create a new channel object for the guild. Requires the &#039;MANAGE_CHANNELS&#039; permission.  Fires a Channel Create Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
name | string | false | *null*
type | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
permission_overwrites | array | false | *null*

## Response

Returns the new channel object on success.

Can Return:

* channel
