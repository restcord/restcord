---
title: Delete Guild
category: Guild
order: 4
---

# `deleteGuild`

```php
$client->guild->deleteGuild($parameters);
```

## Description

Delete a guild permanently. User must be owner.  Fires a Guild Delete Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns the guild object on success.

Can Return:

* guild
