---
title: Edit Message
category: Channel
order: 12
---

# `editMessage`

```php
$client->channel->editMessage($parameters);
```

## Description

Edit a previously sent message. You can only edit messages that have been sent by the current user.  Fires a Message Update Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*
content | string | false | *null*

## Response

Returns a message object.

Can Return:

* message
