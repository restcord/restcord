---
title: Get Guild Widget Image
category: Guild
order: 37
---

# `getGuildWidgetImage`

```php
$client->guild->getGuildWidgetImage($parameters);
```

## Description

Requires no permissions or authentication.
The same documentation also applies to embed.png.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
style | string | false | shield

## Response

Returns a PNG image widget for the guild.

