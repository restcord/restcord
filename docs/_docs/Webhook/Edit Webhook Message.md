---
title: Edit Webhook Message
category: Webhook
order: 14
---

# `editWebhookMessage`

```php
$client->webhook->editWebhookMessage($parameters);
```

## Description

message

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*
webhook.token | string | true | *null*
message.id | snowflake | true | *null*
thread_id | snowflake | false | *null*
content | string | false | *null*
embeds | array | false | *null*
allowed_mentions | object | false | *null*
components | array | false | *null*
files | file contents | false | *null*
payload_json | string | false | *null*
attachments | array | false | *null*

## Response

Possibly No Response

