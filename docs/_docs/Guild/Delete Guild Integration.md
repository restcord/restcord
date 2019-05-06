---
title: Delete Guild Integration
category: Guild
order: 32
---

# `deleteGuildIntegration`

```php
$client->guild->deleteGuildIntegration($parameters);
```

## Description

Delete the attached integration object for the guild. Requires the MANAGE_GUILD permission.  Fires a Guild Integrations Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*

## Response

Returns a 204 empty response on success.

