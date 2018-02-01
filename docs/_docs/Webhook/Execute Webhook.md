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
webhook.id | snowflake | true | *null*
webhook.token | string | true | *null*
wait | bool | false | *null*
content | string | false | *null*
username | string | false | *null*
avatar_url | string | false | *null*
tts | bool | false | *null*
file | file contents | false | *null*
embeds | array | false | *null*

## Response

Possibly No Response

