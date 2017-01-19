---
title: Execute Github-Compatible Webhook
category: Webhook
order: 12
---

# `executeGithubcompatibleWebhook`

```php
$client->webhook->executeGithubcompatibleWebhook($parameters);
```

## Description

Add a new webhook to your GitHub repo (in the repo&#039;s settings), and use this endpoint as the &quot;Payload URL.&quot; You can choose what events your Discord channel receives by choosing the &quot;Let me select individual events&quot; option and selecting individual events for the new webhook you&#039;re configuring.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | true | *null*
webhook.token | string | true | *null*

## Response

Possibly No Response

