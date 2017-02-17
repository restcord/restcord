---
title: Get Gateway
category: Gateway
order: 1
---

# `getGateway`

```php
$client->gateway->getGateway($parameters);
```

## Description

Clients should cache this value and only call this endpoint to retrieve a new URL if they are unable to properly establish a connection using the cached version of the URL.

## Parameters

No Parameters

## Response

Returns an object with a single valid WSS URL, which the client can use as a basis for Connecting.

