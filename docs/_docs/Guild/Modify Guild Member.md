---
title: Modify Guild Member
category: Guild
order: 12
---

# `modifyGuildMember`

```php
$client->guild->modifyGuildMember($parameters);
```

## Description

Modify attributes of a guild member.  Fires a Guild Member Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
nick | string | false | *null*
roles | array | false | *null*
mute | bool | false | *null*
deaf | bool | false | *null*
channel_id | snowflake | false | *null*
guild.id | snowflake | 1 | *null*
user.id | snowflake | 1 | *null*

## Response

Returns a 204 empty response on success.

