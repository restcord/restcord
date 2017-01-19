---
title: List Guild Members
category: Guild
order: 10
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
guild.id | snowflake | false | *null*

## Response

Returns a list of guild member objects that are members of the guild.

Can Return:

* guild member
