---
title: Get Guild Prune Count
category: Guild
order: 25
---

# `getGuildPruneCount`

```php
$client->guild->getGuildPruneCount($parameters);
```

## Description

Requires the KICK_MEMBERS permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
days | integer | false | *null*

## Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that would be removed in a prune operation.

