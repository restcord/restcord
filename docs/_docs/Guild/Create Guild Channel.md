---
title: Create Guild Channel
category: Guild
order: 7
---

# `createGuildChannel`

```php
$client->guild->createGuildChannel($parameters);
```

## Description

channel

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
name | string | false | *null*
type | integer | false | *null*
topic | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
rate_limit_per_user | integer | false | *null*
position | integer | false | *null*
permission_overwrites | array | false | *null*
parent_id | snowflake | false | *null*
nsfw | boolean | false | *null*

## Response

Possibly No Response

