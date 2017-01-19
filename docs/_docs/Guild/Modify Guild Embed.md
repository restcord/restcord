---
title: Modify Guild Embed
category: Guild
order: 34
---

# `modifyGuildEmbed`

```php
$client->guild->modifyGuildEmbed($parameters);
```

## Description

Modify a guild embed object for the guild. All attributes may be passed in with JSON and modified. Requires the &#039;MANAGE_GUILD&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns the updated guild embed object.

Can Return:

* guild embed
