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

Modify a guild role. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
permissions | integer | false | *null*
color | integer | false | *null*
hoist | bool | false | *null*
mentionable | bool | false | *null*
guild.id | snowflake | true | *null*
role.id | string | true | *null*

## Response

Returns the updated role on success.

Can Return:

* role
