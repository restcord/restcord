---
title: Modify Guild Channel Positions
category: Guild
order: 8
---

# `modifyGuildChannelPositions`

```php
$client->guild->modifyGuildChannelPositions($parameters);
```

## Description

Modify the positions of a set of channel objects for the guild. Requires &#039;MANAGE_CHANNELS&#039; permission.  Fires multiple Channel Update Gateway events.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
position | integer | false | *null*
guild.id | snowflake | 1 | *null*

## Response

Returns a list of all of the guild&#039;s channel objects on success.

Can Return:

* channel
