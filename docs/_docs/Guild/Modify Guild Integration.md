---
title: Modify Guild Integration
category: Guild
order: 30
---

# `modifyGuildIntegration`

```php
$client->guild->modifyGuildIntegration($parameters);
```

## Description

Modify the behavior and settings of a integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
integration.id | string | true | *null*
expire_behavior | integer | false | *null*
expire_grace_period | integer | false | *null*
enable_emoticons | bool | false | *null*

## Response

Returns a 204 empty response on success.

