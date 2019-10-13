---
title: Modify Guild
category: Guild
order: 3
---

# `modifyGuild`

```php
$client->guild->modifyGuild($parameters);
```

## Description

Modify a guild&#039;s settings. Requires the MANAGE_GUILD permission.  Fires a Guild Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
name | string | false | *null*
region | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
explicit_content_filter | integer | false | *null*
afk_channel_id | snowflake | false | *null*
afk_timeout | integer | false | *null*
icon | string | false | *null*
owner_id | snowflake | false | *null*
splash | string | false | *null*
system_channel_id | snowflake | false | *null*

## Response

Returns the updated guild object on success.

Can Return:

* guild
