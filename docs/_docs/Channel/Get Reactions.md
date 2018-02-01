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
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*
emoji | string | true | *null*
before | snowflake | false | *null*
after | snowflake | false | *null*
limit | integer | false | 100

## Response

Returns an array of user objects on success.

Can Return:

* user
