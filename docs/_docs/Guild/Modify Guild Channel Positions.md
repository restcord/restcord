---
title: Modify Guild Channel Positions
category: Guild
order: 7
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
guild.id | snowflake | true | *null*
id | snowflake | false | *null*
position | integer | false | *null*

## Response

Returns a 204 empty response on success.

