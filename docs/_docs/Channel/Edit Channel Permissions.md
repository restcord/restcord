---
title: Edit Channel Permissions
category: Channel
order: 15
---

# `editChannelPermissions`

```php
$client->channel->editChannelPermissions($parameters);
```

## Description

Edit the channel permission overwrites for a user or role in a channel. Only usable for guild channels. Requires the &#039;MANAGE_ROLES&#039; permission.  For more information about permissions, see permissions.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
overwrite.id | string | true | *null*
allow | integer | false | *null*
deny | integer | false | *null*
type | string | false | *null*

## Response

Returns a 204 empty response on success.

