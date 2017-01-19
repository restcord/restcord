---
title: Execute Webhook
category: Webhook
order: 10
---

# `executeWebhook`

```php
$client->webhook->executeWebhook($parameters);
```

## Description

This endpoint supports both JSON and form data bodies. It does require multipart/form-data requests instead of the normal JSON request type when uploading files. Make sure you set your Content-Type to multipart/form-data if you&#039;re doing that. Note that in that case, the embeds field cannot be used, but you can pass an url-encoded JSON body as a form value for payload_json.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | 1 | *null*
webhook.token | string | 1 | *null*

## Response

Possibly No Response

