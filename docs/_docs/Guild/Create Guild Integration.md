---
title: Create Guild Integration
category: Guild
order: 30
---

# `createGuildIntegration`

```php
$client->guild->createGuildIntegration($parameters);
```

## Description

Attach an integration object from the current user to the guild. Requires the MANAGE_GUILD permission.  Fires a Guild Integrations Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
type | string | false | *null*
id | snowflake | false | *null*

## Response

Returns a 204 empty response on success.

