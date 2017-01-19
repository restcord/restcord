---
title: Accept Invite
category: Invite
order: 3
---

# `acceptInvite`

```php
$client->invite->acceptInvite($parameters);
```

## Description

Accept an invite. This is not available to bot accounts, and requires the guilds.join OAuth2 scope to accept on behalf of normal users.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | true | *null*

## Response

Returns an invite object on success.

Can Return:

* invite object
