---
title: Add Guild Member Role
category: Guild
order: 13
---

# `addGuildMemberRole`

```php
$client->guild->addGuildMemberRole($parameters);
```

## Description

Adds a role to a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*
role.id | string | false | *null*

## Response

Returns a 204 empty response on success.

