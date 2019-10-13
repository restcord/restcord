---
title: Delete Channel Permission
category: Channel
order: 18
---

# `deleteChannelPermission`

```php
$client->channel->deleteChannelPermission($parameters);
```

## Description

Delete a channel permission overwrite for a user or role in a channel. Only usable for guild channels. Requires the MANAGE_ROLES permission.  For more information about permissions, see permissions

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
overwrite.id | string | true | *null*

## Response

Returns a 204 empty response on success.

