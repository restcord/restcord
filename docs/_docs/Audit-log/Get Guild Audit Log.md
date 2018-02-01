---
title: Get Guild Audit Log
category: Audit-Log
order: 1
---

# `getGuildAuditLog`

```php
$client->audit-log->getGuildAuditLog($parameters);
```

## Description

Requires the &#039;VIEW_AUDIT_LOG&#039; permission.

## Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | true | *null*

## Response

Returns an audit log object for the guild.

Can Return:

* audit log
