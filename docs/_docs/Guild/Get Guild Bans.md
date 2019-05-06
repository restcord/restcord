---
title: Get Guild Bans
category: Guild
order: 16
---

# `getGuildBans`

```php
$client->guild->getGuildBans($parameters);
```

## Description

Requires the BAN_MEMBERS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of ban objects for the users banned from this guild.

Can Return:

* ban
