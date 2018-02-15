---
title: Modify Current User Nick
category: Guild
order: 12
---

# `modifyCurrentUserNick`

```php
$client->guild->modifyCurrentUserNick($parameters);
```

## Description

Modifies the nickname of the current user in a guild.  Fires a Guild Member Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
nick | string | false | *null*

## Response

Returns a 200 with the nickname on success.

