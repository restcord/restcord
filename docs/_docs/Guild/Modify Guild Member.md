---
title: Modify Guild Member
category: Guild
order: 14
---

# `modifyGuildMember`

```php
$client->guild->modifyGuildMember($parameters);
```

## Description

guild member

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*
nick | string | false | *null*
roles | array | false | *null*
mute | boolean | false | *null*
deaf | boolean | false | *null*
channel_id | snowflake | false | *null*

## Response

Possibly No Response

