---
title: Modify Guild
category: Guild
order: 4
---

# `modifyGuild`

```php
$client->guild->modifyGuild($parameters);
```

## Description

Modify a guild&#039;s settings.  Fires a Guild Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
afk_channel_id | snowflake | false | *null*
afk_timeout | integer | false | *null*
icon | string | false | *null*
owner_id | snowflake | false | *null*
splash | string | false | *null*
guild.id | snowflake | true | *null*

## Response

Returns the updated guild object on success.

Can Return:

* guild
