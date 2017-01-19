---
title: Delete/close Channel
category: Channel
order: 3
---

# `deletecloseChannel`

```php
$client->channel->deletecloseChannel($parameters);
```

## Description

Delete a guild channel, or close a private message. Requires the &#039;MANAGE_CHANNELS&#039; permission for the guild.  Fires a Channel Delete Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a guild channel or dm channel object on success.

Can Return:

* guild channel
* dm channel
