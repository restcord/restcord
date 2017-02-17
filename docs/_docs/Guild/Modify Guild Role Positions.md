---
title: Modify Guild Role Positions
category: Guild
order: 21
---

# `modifyGuildRolePositions`

```php
$client->guild->modifyGuildRolePositions($parameters);
```

## Description

Modify the positions of a set of role objects for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires multiple Guild Role Update Gateway events.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
id | snowflake | false | *null*
position | integer | false | *null*

## Response

Returns a list of all of the guild&#039;s role objects on success.

Can Return:

* role
