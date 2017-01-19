---
title: Add Pinned Channel Message
category: Channel
order: 22
---

# `addPinnedChannelMessage`

```php
$client->channel->addPinnedChannelMessage($parameters);
```

## Description

Pin a message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | 1 | *null*
message.id | snowflake | 1 | *null*

## Response

Returns a 204 empty response on success.

