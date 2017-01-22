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

Requires the &#039;KICK_MEMBERS&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
days | integer | false | *null*
guild.id | snowflake | true | *null*

## Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that would be removed in a prune operation.

