---
title: Delete Invite
category: Invite
order: 2
---

# `deleteInvite`

```php
$client->invite->deleteInvite($parameters);
```

## Description

Delete an invite. Requires the MANAGE_CHANNELS permission on the channel this invite belongs to, or MANAGE_GUILD to remove any invite across the guild.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | true | *null*

## Response

Returns an invite object on success.

Can Return:

* invite
