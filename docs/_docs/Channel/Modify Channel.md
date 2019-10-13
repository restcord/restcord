---
title: Modify Channel
category: Channel
order: 2
---

# `modifyChannel`

```php
$client->channel->modifyChannel($parameters);
```

## Description

Update a channels settings. Requires the MANAGE_CHANNELS permission for the guild.  Fires a Channel Update Gateway event. If modifying a category, individual Channel Update events will fire for each child channel that also changes. For the PATCH method, all the JSON Params are optional.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
name | string | false | *null*
position | integer | false | *null*
topic | string | false | *null*
nsfw | boolean | false | *null*
rate_limit_per_user | integer | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
permission_overwrites | array | false | *null*
parent_id | snowflake | false | *null*

## Response

Returns a channel on success, and a 400 BAD REQUEST on invalid parameters.

Can Return:

* channel
