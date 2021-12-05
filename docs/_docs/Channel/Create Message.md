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

message

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
content | string | false | *null*
tts | boolean | false | *null*
embeds | array | false | *null*
embed (deprecated) | object | false | *null*
allowed_mentions | object | false | *null*
message_reference | message reference | false | *null*
components | array | false | *null*
sticker_ids | array | false | *null*
files | file contents | false | *null*
payload_json | string | false | *null*
attachments | array | false | *null*

## Response

Possibly No Response

