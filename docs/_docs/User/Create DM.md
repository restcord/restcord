---
title: Create Dm
category: User
order: 7
---

# `createDm`

```php
$client->user->createDm($parameters);
```

## Description

Create a new DM channel with a user.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
recipient_id | snowflake | false | *null*

## Response

Returns a DM channel object.

Can Return:

* DM channel
