---
title: Modify Guild Emoji
category: Emoji
order: 4
---

# `modifyGuildEmoji`

```php
$client->emoji->modifyGuildEmoji($parameters);
```

## Description

Modify the given emoji. Requires the MANAGE_EMOJIS permission.  Fires a Guild Emojis Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
emoji.id | string | true | *null*
name | string | false | *null*
roles | array | false | *null*

## Response

Returns the updated emoji object on success.

Can Return:

* emoji
