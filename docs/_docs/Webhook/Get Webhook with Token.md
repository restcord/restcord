---
title: Get Webhook With Token
category: Webhook
order: 5
---

# `getWebhookWithToken`

```php
$client->webhook->getWebhookWithToken($parameters);
```

## Description

Same as above, except this call does not require authentication and returns no user in the webhook object.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | 1 | *null*
webhook.token | string | 1 | *null*

## Response

Possibly No Response

