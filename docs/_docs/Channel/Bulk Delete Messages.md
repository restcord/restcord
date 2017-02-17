---
title: Bulk Delete Messages
category: Channel
order: 14
---

# `bulkDeleteMessages`

```php
$client->channel->bulkDeleteMessages($parameters);
```

## Description

Delete multiple messages in a single request. This endpoint can only be used on guild channels and requires the &#039;MANAGE_MESSAGES&#039; permission.  Fires multiple Message Delete Gateway events.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
messages | array | false | *null*

## Response

Returns a 204 empty response on success.

