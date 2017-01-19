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
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*

## Response

Possibly No Response

