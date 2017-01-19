---
title: Delete Pinned Channel Message
category: Channel
order: 23
---

# `deletePinnedChannelMessage`

```php
$client->channel->deletePinnedChannelMessage($parameters);
```

## Description

Delete a pinned message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

