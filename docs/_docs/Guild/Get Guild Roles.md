---
title: Get Guild Roles
category: Guild
order: 19
---

# `getGuildRoles`

```php
$client->guild->getGuildRoles($parameters);
```

## Description

Requires the &#039;MANAGE_ROLES&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of role objects for the guild.

Can Return:

* role
