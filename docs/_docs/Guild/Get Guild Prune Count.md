---
title: Get Guild Prune Count
category: Guild
order: 24
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
guild.id | snowflake | true | *null*
days | integer | false | *null*

## Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that would be removed in a prune operation.

