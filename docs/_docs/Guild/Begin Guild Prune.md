---
title: Begin Guild Prune
category: Guild
order: 25
---

# `beginGuildPrune`

```php
$client->guild->beginGuildPrune($parameters);
```

## Description

Begin a prune operation. Requires the &#039;KICK_MEMBERS&#039; permission.  Fires multiple Guild Member Remove Gateway events.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
days | integer | false | *null*

## Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that were removed in the prune operation.

