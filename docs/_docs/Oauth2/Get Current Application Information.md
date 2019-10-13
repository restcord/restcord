---
title: Get Current Application Information
category: Oauth2
order: 1
---

# `getCurrentApplicationInformation`

```php
$client->oauth2->getCurrentApplicationInformation($parameters);
```

## Description



## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
name | string | false | *null*
icon | string | false | *null*
description | string | false | *null*
rpc_origins? | array | false | *null*
bot_public | boolean | false | *null*
bot_require_code_grant | boolean | false | *null*
owner | object | false | *null*

## Response

Returns the bot&#039;s OAuth2 application info.

