---
title: Create Group Dm
category: User
order: 8
---

# `createGroupDm`

```php
$client->user->createGroupDm($parameters);
```

## Description

Create a new group DM channel with multiple users.  This endpoint was intended to be used with the now-deprecated GameBridge SDK. DMs created with this endpoint will not be shown in the Discord client

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_tokens | array | false | *null*
nicks | dict | false | *null*

## Response

Returns a DM channel object.

Can Return:

* DM channel
