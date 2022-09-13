---
title: Create Guild
category: Guild
order: 1
---

# `createGuild`

```php
$client->guild->createGuild($parameters);
```

## Description

guild

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
icon | image data | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
explicit_content_filter | integer | false | *null*
roles | array | false | *null*
channels | array | false | *null*
afk_channel_id | snowflake | false | *null*
afk_timeout | integer | false | *null*
system_channel_id | snowflake | false | *null*
system_channel_flags | integer | false | *null*

## Response

Possibly No Response

