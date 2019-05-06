---
title: Delete/close Channel
category: Channel
order: 3
---

# `deleteOrcloseChannel`

```php
$client->channel->deleteOrcloseChannel($parameters);
```

## Description

Delete a channel, or close a private message. Requires the MANAGE_CHANNELS permission for the guild. Deleting a category does not delete its child channels; they will have their parent_id removed and a Channel Update Gateway event will fire for each of them.  Fires a Channel Delete Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a channel object on success.

Can Return:

* channel
