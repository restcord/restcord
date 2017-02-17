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

If operating on a guild channel, this endpoint requires the &#039;READ_MESSAGES&#039; permission to be present on the current user.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
around | snowflake | false | absent
before | snowflake | false | absent
after | snowflake | false | absent
limit | integer | false | 50

## Response

Returns the messages for a channel.

