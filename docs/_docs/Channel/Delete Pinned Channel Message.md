---
title: Delete Pinned Channel Message
category: Channel
order: 22
---

# `deletePinnedChannelMessage`

```php
$client->channel->deletePinnedChannelMessage($parameters);
```

## Description

Delete a pinned message in a channel. Requires the MANAGE_MESSAGES permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

