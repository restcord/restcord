# Gateway

## Get Gateway - `getGateway`

```php
$client->gateway->getGateway($parameters);
```
##### Description

Bots that want to dynamically/automatically spawn shard processes should use this endpoint to determine the number of processes to run. This route should be called once, and the result cached/passed to all processes. This value is not guarenteed to be the same per-call.

##### Parameters

No Parameters

##### Response

Returns an object with the same information as Get Gateway, plus a shards key, containing the recommended number of shards to connect with (as an integer).




---

