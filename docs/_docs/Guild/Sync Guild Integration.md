---
title: Sync Guild Integration
category: Guild
order: 32
---

# `syncGuildIntegration`

```php
$client->guild->syncGuildIntegration($parameters);
```

## Description

Sync an integration. Requires the &#039;MANAGE_GUILD&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*

## Response

Returns a 204 empty response on success.

