---
title: Delete Guild Role
category: Guild
order: 24
---

# `deleteGuildRole`

```php
$client->guild->deleteGuildRole($parameters);
```

## Description

Delete a guild role. Requires the MANAGE_ROLES permission.  Fires a Guild Role Delete Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
role.id | string | true | *null*

## Response

Returns a 204 empty response on success.

