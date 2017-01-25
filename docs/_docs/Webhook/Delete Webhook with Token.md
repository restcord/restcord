---
title: Delete Webhook With Token
category: Webhook
order: 9
---

# `deleteWebhookWithToken`

```php
$client->webhook->deleteWebhookWithToken($parameters);
```

## Description

Same as above, except this call does not require authentication.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*
webhook.token | string | true | *null*

## Response

Possibly No Response

