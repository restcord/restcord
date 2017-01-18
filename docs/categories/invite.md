# Invite

## Get Invite - `getInvite`

```php
$client->invite->getInvite($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

##### Response

Returns an invite object for the given code.

Can Return:
* invite object



---

## Delete Invite - `deleteInvite`

```php
$client->invite->deleteInvite($parameters);
```
##### Description

Delete an invite. Requires the MANAGE_CHANNELS permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

##### Response

Returns an invite object on success.

Can Return:
* invite object



---

## Accept Invite - `acceptInvite`

```php
$client->invite->acceptInvite($parameters);
```
##### Description

Accept an invite. This is not available to bot accounts, and requires the guilds.join OAuth2 scope to accept on behalf of normal users.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

##### Response

Returns an invite object on success.

Can Return:
* invite object



---

