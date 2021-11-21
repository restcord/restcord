---
title: Get Reactions
category: Channel
order: 11
---

# `getReactions`

```php
$client->channel->getReactions($parameters);
```

## Description

user

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*
emoji | string | true | *null*
after | snowflake | false | *null*
limit | integer | false | 25

## Response

Possibly No Response

