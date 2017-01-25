---
title: List Guild Members
category: Guild
order: 9
---

# `listGuildMembers`

```php
$client->guild->listGuildMembers($parameters);
```

## Description



## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
limit | integer | false | 1
after | integer | false | 0
guild.id | snowflake | true | *null*

## Response

Returns a list of guild member objects that are members of the guild.

Can Return:

* guild member
