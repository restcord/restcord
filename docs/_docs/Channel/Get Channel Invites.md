---
title: Get Channel Invites
category: Channel
order: 16
---

# `getChannelInvites`

```php
$client->channel->getChannelInvites($parameters);
```

## Description

Only usable for guild channels. Requires the MANAGE_CHANNELS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a list of invite objects (with invite metadata) for the channel.

Can Return:

* invite
* invite metadata
