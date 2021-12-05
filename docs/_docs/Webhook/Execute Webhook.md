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

Uploading Files

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*
webhook.token | string | true | *null*
wait | boolean | false | *null*
thread_id | snowflake | false | *null*
content | string | false | *null*
username | string | false | *null*
avatar_url | string | false | *null*
tts | boolean | false | *null*
embeds | array | false | *null*
allowed_mentions | object | false | *null*
components | array | false | *null*
files | file contents | false | *null*
payload_json | string | false | *null*
attachments | array | false | *null*

## Response

Possibly No Response

