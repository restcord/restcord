---
title: Modify Current User
category: User
order: 3
---

# `modifyCurrentUser`

```php
$client->user->modifyCurrentUser($parameters);
```

## Description

Modify the requestors user account settings.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
username | string | false | *null*
avatar | avatar data | false | *null*

## Response

Returns a user object on success.

Can Return:

* user
