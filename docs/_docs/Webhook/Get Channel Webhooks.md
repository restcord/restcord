---
title: Get Channel Webhooks
category: Webhook
order: 2
---

# `getChannelWebhooks`

```php
$client->webhook->getChannelWebhooks($parameters);
```

## Description

Requires the MANAGE_WEBHOOKS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a list of channel webhook objects.

Can Return:

* webhook
