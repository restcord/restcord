---
title: Delete Webhook
category: Webhook
order: 8
---

# `deleteWebhook`

```php
$client->webhook->deleteWebhook($parameters);
```

## Description

Delete a webhook permanently. User must be owner.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*

## Response

Returns a 204 NO CONTENT response on success.

