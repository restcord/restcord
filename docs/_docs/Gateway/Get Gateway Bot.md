---
title: Get Gateway Bot
category: Gateway
order: 2
---

# `getGatewayBot`

```php
$client->gateway->getGatewayBot($parameters);
```

## Description

Bots that want to dynamically/automatically spawn shard processes should use this endpoint to determine the number of processes to run. This route should be called once when starting up numerous shards, with the response being cached and passed to all sub-shards/processes. Unlike the Get Gateway, this route should not be cached for extended periods of time as the value is not guaranteed to be the same per-call, and changes as the bot joins/leaves guilds.

## Parameters

No Parameters

## Response

Returns an object with the same information as Get Gateway, plus a shards key, containing the recommended number of shards to connect with (as an integer).

