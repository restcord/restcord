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

guild

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
icon | image data | false | *null*
owner_id | snowflake | false | *null*
splash | image data | false | *null*
discovery_splash | image data | false | *null*
banner | image data | false | *null*
system_channel_id | snowflake | false | *null*
system_channel_flags | integer | false | *null*
rules_channel_id | snowflake | false | *null*
public_updates_channel_id | snowflake | false | *null*
preferred_locale | string | false | *null*
features | array | false | *null*
description | string | false | *null*
premium_progress_bar_enabled | boolean | false | *null*

## Response

Possibly No Response

