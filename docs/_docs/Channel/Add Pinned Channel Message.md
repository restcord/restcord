---
title: Add Pinned Channel Message
category: Channel
order: 21
---

# `addPinnedChannelMessage`

```php
$client->channel->addPinnedChannelMessage($parameters);
```

## Description

Pin a message in a channel. Requires the MANAGE_MESSAGES permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

