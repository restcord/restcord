---
title: Get Reactions
category: Channel
order: 10
---

# `getReactions`

```php
$client->channel->getReactions($parameters);
```

## Description

Get a list of users that reacted with this emoji.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | 1 | *null*
message.id | snowflake | 1 | *null*
emoji | string | 1 | *null*

## Response

Returns an array of user objects on success.

Can Return:

* user
