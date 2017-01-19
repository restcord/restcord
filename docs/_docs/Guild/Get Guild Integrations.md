---
title: Get Guild Integrations
category: Guild
order: 28
---

# `getGuildIntegrations`

```php
$client->guild->getGuildIntegrations($parameters);
```

## Description

Requires the &#039;MANAGE_GUILD&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of integration objects for the guild.

Can Return:

* integration
