---
title: Get Current User
category: User
order: 1
---

# `getCurrentUser`

```php
$client->user->getCurrentUser($parameters);
```

## Description

For OAuth2, this requires the identify scope, which will return the object without an email, and optionally the email scope, which returns the object with an email.

## Parameters

No Parameters

## Response

Returns the user object of the requester&#039;s account.

Can Return:

* user
