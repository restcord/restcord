---
title: Create Message
category: Channel
order: 6
---

# `createMessage`

```php
$client->channel->createMessage($parameters);
```

## Description

Post a message to a guild text or DM channel. If operating on a guild channel, this endpoint requires the &#039;SEND_MESSAGES&#039; permission to be present on the current user.  Fires a Message Create Gateway event. See message formatting for more information on how to properly format messages.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
content | string | false | *null*
nonce | snowflake | false | *null*
tts | bool | false | *null*
file | file contents | false | *null*
embed | object | false | *null*

## Response

Returns a message object.

Can Return:

* message
