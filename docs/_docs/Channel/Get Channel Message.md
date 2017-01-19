---
title: Get Channel Message
category: Channel
order: 5
---

# `getChannelMessage`

```php
$client->channel->getChannelMessage($parameters);
```

## Description

If operating on a guild channel, this endpoints requires the &#039;READ_MESSAGE_HISTORY&#039; permission to be present on the current user.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | 1 | *null*
message.id | snowflake | 1 | *null*

## Response

Returns a specific message in the channel.

