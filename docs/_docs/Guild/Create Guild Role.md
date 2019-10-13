---
title: Create Guild Role
category: Guild
order: 21
---

# `createGuildRole`

```php
$client->guild->createGuildRole($parameters);
```

## Description

Create a new role for the guild. Requires the MANAGE_ROLES permission.  Fires a Guild Role Create Gateway event. All JSON params are optional.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
name | string | false | &quot;new role&quot;
permissions | integer | false | *null*
color | integer | false | 0
hoist | boolean | false | *null*
mentionable | boolean | false | *null*

## Response

Returns the new role object on success.

Can Return:

* role
