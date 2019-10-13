---
title: Sync Guild Integration
category: Guild
order: 33
---

# `syncGuildIntegration`

```php
$client->guild->syncGuildIntegration($parameters);
```

## Description

Sync an integration. Requires the MANAGE_GUILD permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*

## Response

Returns a 204 empty response on success.

