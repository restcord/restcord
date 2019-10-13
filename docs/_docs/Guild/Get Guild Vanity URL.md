---
title: Get Guild Vanity Url
category: Guild
order: 36
---

# `getGuildVanityUrl`

```php
$client->guild->getGuildVanityUrl($parameters);
```

## Description

Requires the MANAGE_GUILD permission. code will be null if a vanity url for the guild is not set.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a partial invite object for guilds with that feature enabled.

Can Return:

* invite
