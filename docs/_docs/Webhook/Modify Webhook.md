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

Modify a webhook.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
avatar | string | false | *null*
webhook.id | string | 1 | *null*

## Response

Returns the updated webhook object on success.

Can Return:

* webhook
