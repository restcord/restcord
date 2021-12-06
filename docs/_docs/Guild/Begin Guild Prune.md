---
title: Begin Guild Prune
category: Guild
order: 30
---

# `beginGuildPrune`

```php
$client->guild->beginGuildPrune($parameters);
```

## Description

Guild Member Remove

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
days | integer | false | 7
compute_prune_count | boolean | false | true
include_roles | array | false | none
reason | string | false | *null*

## Response

Possibly No Response

