---
title: Create Guild Role
category: Guild
order: 25
---

# `createGuildRole`

```php
$client->guild->createGuildRole($parameters);
```

## Description

role

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
name | string | false | &quot;new role&quot;
permissions | string | false | @everyone permissions in guild
color | integer | false | 0
hoist | boolean | false | *null*
icon | image data | false | null
unicode_emoji | string | false | null
mentionable | boolean | false | *null*

## Response

Possibly No Response

