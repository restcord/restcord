---
title: Remove Guild Member
category: Guild
order: 15
---

# `removeGuildMember`

```php
$client->guild->removeGuildMember($parameters);
```

## Description

Remove a member from a guild. Requires &#039;KICK_MEMBERS&#039; permission.  Fires a Guild Member Remove Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

