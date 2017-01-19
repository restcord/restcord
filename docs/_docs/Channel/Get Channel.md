---
title: Get Channel
category: Channel
order: 1
---

# `getChannel`

```php
$client->channel->getChannel($parameters);
```

## Description

Get a channel by ID.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a guild channel or dm channel object.

Can Return:

* guild channel
* dm channel
