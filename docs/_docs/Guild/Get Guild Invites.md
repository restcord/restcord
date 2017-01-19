---
title: Get Guild Invites
category: Guild
order: 27
---

# `getGuildInvites`

```php
$client->guild->getGuildInvites($parameters);
```

## Description

Requires the &#039;MANAGE_GUILD&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns a list of invite objects (with invite metadata) for the guild.

Can Return:

* invite
* invite metadata
