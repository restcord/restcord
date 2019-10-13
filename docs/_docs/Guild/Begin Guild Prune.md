---
title: Begin Guild Prune
category: Guild
order: 26
---

# `beginGuildPrune`

```php
$client->guild->beginGuildPrune($parameters);
```

## Description

Begin a prune operation. Requires the KICK_MEMBERS permission.  For large guilds it&#039;s recommended to set the compute_prune_count option to false, forcing &#039;pruned&#039; to null. Fires multiple Guild Member Remove Gateway events.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
days | integer | false | *null*
compute_prune_count | boolean | false | *null*

## Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that were removed in the prune operation.

