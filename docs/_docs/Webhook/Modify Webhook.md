---
title: Modify Webhook
category: Webhook
order: 6
---

# `modifyWebhook`

```php
$client->webhook->modifyWebhook($parameters);
```

## Description

Modify a webhook. Requires the &#039;MANAGE_WEBHOOKS&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*
name | string | false | *null*
avatar | string | false | *null*
channel_id | snowflake | false | *null*

## Response

Returns the updated webhook object on success.

Can Return:

* webhook
