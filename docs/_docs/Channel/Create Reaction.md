---
title: Create Reaction
category: Channel
order: 7
---

# `createReaction`

```php
$client->channel->createReaction($parameters);
```

## Description

Create a reaction for the message. If nobody else has reacted to the message using this emoji, this endpoint requires the &#039;ADD_REACTIONS&#039; permission to be present on the current user.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | 1 | *null*
message.id | snowflake | 1 | *null*
emoji | string | 1 | *null*

## Response

Returns a 204 empty response on success.

