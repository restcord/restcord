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

Create a new guild.  Fires a Guild Create Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
icon | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
explicit_content_filter | integer | false | *null*
roles | array | false | *null*
channels | array | false | *null*

## Response

Returns a guild object on success.

Can Return:

* guild
