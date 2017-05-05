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
guild.id | snowflake | true | *null*
limit | integer | false | 1
after | snowflake | false | *null*

## Response

Returns a list of guild member objects that are members of the guild.

Can Return:

* guild member
