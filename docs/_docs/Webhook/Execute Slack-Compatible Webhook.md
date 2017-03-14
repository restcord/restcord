---
title: Execute Slack-Compatible Webhook
category: Webhook
order: 11
---

# `executeSlackCompatibleWebhook`

```php
$client->webhook->executeSlackCompatibleWebhook($parameters);
```

## Description

Refer to Slack&#039;s documentation for more information. We do not support Slack&#039;s channel, icon_emoji, mrkdwn, or mrkdwn_in properties.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | snowflake | true | *null*
webhook.token | string | true | *null*
wait | bool | false | *null*

## Response

Possibly No Response

