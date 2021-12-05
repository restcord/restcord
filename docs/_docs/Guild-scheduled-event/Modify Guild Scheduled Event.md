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
entity_metadata | entity metadata | false | *null*
name | string | false | *null*
privacy_level | privacy level | false | *null*
scheduled_start_time | ISO8601 timestamp | false | *null*
scheduled_end_time | ISO8601 timestamp | false | *null*
description | string | false | *null*
entity_type | event entity type | false | *null*
status | event status | false | *null*

## Response

Possibly No Response

