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
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

## Response

Returns an array of user objects on success.

Can Return:

* user
