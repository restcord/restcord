---
title: Create Channel Invite
category: Channel
order: 19
---

# `createChannelInvite`

```php
$client->channel->createChannelInvite($parameters);
```

## Description

invite

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
max_age | integer | false | 86400
max_uses | integer | false | 0
temporary | boolean | false | *null*
unique | boolean | false | *null*
target_type | integer | false | *null*
target_user_id | snowflake | false | *null*
target_application_id | snowflake | false | *null*

## Response

Possibly No Response

