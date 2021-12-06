---
title: Add Guild Member
category: Guild
order: 13
---

# `addGuildMember`

```php
$client->guild->addGuildMember($parameters);
```

## Description

guild member

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*
access_token | string | false | *null*
nick | string | false | *null*
roles | array | false | *null*
mute | boolean | false | *null*
deaf | boolean | false | *null*

## Response

Possibly No Response

