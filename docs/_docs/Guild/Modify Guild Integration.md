---
title: Modify Guild Integration
category: Guild
order: 31
---

# `modifyGuildIntegration`

```php
$client->guild->modifyGuildIntegration($parameters);
```

## Description

Modify the behavior and settings of an integration object for the guild. Requires the MANAGE_GUILD permission.  Fires a Guild Integrations Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*
expire_behavior | integer | false | *null*
expire_grace_period | integer | false | *null*
enable_emoticons | boolean | false | *null*

## Response

Returns a 204 empty response on success.

