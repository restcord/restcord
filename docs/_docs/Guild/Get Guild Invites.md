---
title: Get Guild Invites
category: Guild
order: 28
---

# `getGuildInvites`

```php
$client->guild->getGuildInvites($parameters);
```

## Description

Requires the MANAGE_GUILD permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of invite objects (with invite metadata) for the guild.

Can Return:

* invite
* invite metadata
