---
title: Get Guild Integrations
category: Guild
order: 29
---

# `getGuildIntegrations`

```php
$client->guild->getGuildIntegrations($parameters);
```

## Description

Requires the MANAGE_GUILD permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of integration objects for the guild.

Can Return:

* integration
