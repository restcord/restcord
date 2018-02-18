---
title: Get Current User Guilds
category: User
order: 4
---

# `getCurrentUserGuilds`

```php
$client->user->getCurrentUserGuilds($parameters);
```

## Description

Requires the guilds OAuth2 scope.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
before | snowflake | false | *null*
after | snowflake | false | *null*
limit | integer | false | 100

## Response

Returns a list of partial guild objects the current user is a member of.

Can Return:

* guild
