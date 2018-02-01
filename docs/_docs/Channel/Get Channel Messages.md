---
title: Get Channel Messages
category: Channel
order: 4
---

# `getChannelMessages`

```php
$client->channel->getChannelMessages($parameters);
```

## Description

If operating on a guild channel, this endpoint requires the &#039;VIEW_CHANNEL&#039; permission to be present on the current user. If the current user is missing the &#039;READ_MESSAGE_HISTORY&#039; permission in the channel then this will return no messages (since they cannot read the message history).

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
around | snowflake | false | *null*
before | snowflake | false | *null*
after | snowflake | false | *null*
limit | integer | false | 50

## Response

Returns the messages for a channel.

