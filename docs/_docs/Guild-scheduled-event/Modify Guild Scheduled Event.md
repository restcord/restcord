---
title: Modify Guild Scheduled Event
category: Guild-Scheduled-Event
order: 4
---

# `modifyGuildScheduledEvent`

```php
$client->guild-scheduled-event->modifyGuildScheduledEvent($parameters);
```

## Description

guild scheduled event

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
channel_id | snowflake | false | *null*
entity_metadata | array | false | *null*
name | string | false | *null*
privacy_level | integer | false | *null*
scheduled_start_time | string | false | *null*
scheduled_end_time | string | false | *null*
description | string | false | *null*
entity_type | array | false | *null*
status | integer | false | *null*

## Response

Possibly No Response

