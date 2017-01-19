---
title: Delete Guild Integration
category: Guild
order: 31
---

# `deleteGuildIntegration`

```php
$client->guild->deleteGuildIntegration($parameters);
```

## Description

Delete the attached integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*

## Response

Returns a 204 empty response on success.

