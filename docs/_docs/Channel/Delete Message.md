---
title: Delete Message
category: Channel
order: 13
---

# `deleteMessage`

```php
$client->channel->deleteMessage($parameters);
```

## Description

Delete a message. If operating on a guild channel and trying to delete a message that was not sent by the current user, this endpoint requires the MANAGE_MESSAGES permission.  Fires a Message Delete Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

