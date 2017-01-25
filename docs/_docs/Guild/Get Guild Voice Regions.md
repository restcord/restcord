---
title: Get Guild Voice Regions
category: Guild
order: 26
---

# `getGuildVoiceRegions`

```php
$client->guild->getGuildVoiceRegions($parameters);
```

## Description

Unlike the similar /voice route, this returns VIP servers when the guild is VIP-enabled.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of voice region objects for the guild.

Can Return:

* voice region
