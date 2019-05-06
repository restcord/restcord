---
title: Get Guild Ban
category: Guild
order: 17
---

# `getGuildBan`

```php
$client->guild->getGuildBan($parameters);
```

## Description

Requires the BAN_MEMBERS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*

## Response

Returns a ban object for the given user or a 404 not found if the ban cannot be found.

Can Return:

* ban
