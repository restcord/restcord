---
title: Remove Guild Member Role
category: Guild
order: 14
---

# `removeGuildMemberRole`

```php
$client->guild->removeGuildMemberRole($parameters);
```

## Description

Removes a role from a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*
role.id | string | true | *null*

## Response

Returns a 204 empty response on success.

