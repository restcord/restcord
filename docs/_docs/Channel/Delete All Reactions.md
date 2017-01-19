---
title: Delete All Reactions
category: Channel
order: 11
---

# `deleteAllReactions`

```php
$client->channel->deleteAllReactions($parameters);
```

## Description

Deletes all reactions on a message. This endpoint requires the &#039;MANAGE_MESSAGES&#039; permission to be present on the current user.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | 1 | *null*
message.id | snowflake | 1 | *null*

## Response

Possibly No Response

