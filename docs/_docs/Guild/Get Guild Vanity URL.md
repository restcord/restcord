---
title: Get Guild Vanity Url
category: Guild
order: 35
---

# `getGuildVanityUrl`

```php
$client->guild->getGuildVanityUrl($parameters);
```

## Description

Requires the &#039;MANAGE_GUILD&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a partial invite object for guilds with that feature enabled.

Can Return:

* invite
