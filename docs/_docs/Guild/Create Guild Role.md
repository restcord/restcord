---
title: Create Guild Role
category: Guild
order: 20
---

# `createGuildRole`

```php
$client->guild->createGuildRole($parameters);
```

## Description

Create a new empty role object for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Create Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns the new role object on success.

Can Return:

* role
