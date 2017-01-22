---
title: Modify Current User&#039;s Nick
category: Guild
order: 13
---

# `modifyCurrentUser&#039;sNick`

```php
$client->guild->modifyCurrentUser&#039;sNick($parameters);
```

## Description

Modifies the nickname of the current user in a guild.  Fires a Guild Member Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
nick | string | false | *null*
guild.id | snowflake | true | *null*

## Response

Returns a 200 with the nickname on success.

