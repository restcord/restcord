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

Before using this endpoint, you must connect to and identify with a gateway at least once.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
content | string | false | *null*
nonce | snowflake | false | *null*
tts | bool | false | *null*
file | file contents | false | *null*
embed | object | false | *null*
payload_json | string | false | *null*

## Response

Possibly No Response

