---
title: Modify Guild Embed
category: Guild
order: 35
---

# `modifyGuildEmbed`

```php
$client->guild->modifyGuildEmbed($parameters);
```

## Description

Modify a guild embed object for the guild. All attributes may be passed in with JSON and modified. Requires the MANAGE_GUILD permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns the updated guild embed object.

Can Return:

* guild embed
