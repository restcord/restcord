---
title: Get Guild Audit Log
category: Audit-Log
order: 1
---

# `getGuildAuditLog`

```php
$client->auditLog->getGuildAuditLog($parameters);
```

## Description

audit log

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*
user_id | snowflake | false | *null*
action_type | integer | false | *null*
before | snowflake | false | *null*
limit | integer | false | *null*

## Response

Possibly No Response

