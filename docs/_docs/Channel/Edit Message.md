---
title: Edit Message
category: Channel
order: 14
---

# `editMessage`

```php
$client->channel->editMessage($parameters);
```

## Description

default

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
message.id | snowflake | true | *null*
content | string | false | *null*
embeds | array | false | *null*
embed (deprecated) | object | false | *null*
flags | integer | false | *null*
allowed_mentions | object | false | *null*
components | array | false | *null*
files | file contents | false | *null*
payload_json | string | false | *null*
attachments | array | false | *null*

## Response

Possibly No Response

