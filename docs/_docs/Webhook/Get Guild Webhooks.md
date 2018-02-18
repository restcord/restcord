---
title: Get Guild Webhooks
category: Webhook
order: 3
---

# `getGuildWebhooks`

```php
$client->webhook->getGuildWebhooks($parameters);
```

## Description

Requires the &#039;MANAGE_WEBHOOKS&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of guild webhook objects.

Can Return:

* webhook
