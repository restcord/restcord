---
title: Create Webhook
category: Webhook
order: 1
---

# `createWebhook`

```php
$client->webhook->createWebhook($parameters);
```

## Description

Create a new webhook. Requires the MANAGE_WEBHOOKS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
name | string | false | *null*
avatar | avatar data string | false | *null*

## Response

Returns a webhook object on success.

Can Return:

* webhook
