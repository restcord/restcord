---
title: Remove Guild Ban
category: Guild
order: 18
---

# `removeGuildBan`

```php
$client->guild->removeGuildBan($parameters);
```

## Description

Remove the ban for a user. Requires the &#039;BAN_MEMBERS&#039; permissions.  Fires a Guild Ban Remove Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

