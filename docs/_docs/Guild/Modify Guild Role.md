---
title: Modify Guild Role
category: Guild
order: 23
---

# `modifyGuildRole`

```php
$client->guild->modifyGuildRole($parameters);
```

## Description

Modify a guild role. Requires the MANAGE_ROLES permission.  Fires a Guild Role Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
role.id | string | true | *null*
name | string | false | *null*
permissions | integer | false | *null*
color | integer | false | *null*
hoist | boolean | false | *null*
mentionable | boolean | false | *null*

## Response

Returns the updated role on success.

Can Return:

* role
