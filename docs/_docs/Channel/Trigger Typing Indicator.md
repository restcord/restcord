---
title: Trigger Typing Indicator
category: Channel
order: 20
---

# `triggerTypingIndicator`

```php
$client->channel->triggerTypingIndicator($parameters);
```

## Description

Post a typing indicator for the specified channel. Generally bots should not implement this route. However, if a bot is responding to a command and expects the computation to take a few seconds, this endpoint may be called to let the user know that the bot is processing their message.  Fires a Typing Start Gateway event.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*

## Response

Returns a 204 empty response on success.

