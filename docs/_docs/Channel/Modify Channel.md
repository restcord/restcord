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

Update a channels settings. Requires the &#039;MANAGE_GUILD&#039; permission for the guild.  Fires a Channel Update Gateway event. For the PATCH method, all the JSON Params are optional.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | true | *null*
name | string | false | *null*
position | integer | false | *null*
topic | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*

## Response

Returns a guild channel on success, and a 400 BAD REQUEST on invalid parameters.

Can Return:

* guild channel
