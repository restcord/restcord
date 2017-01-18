# User

## Get Current User - `getCurrentUser`

```php
$client->user->getCurrentUser($parameters);
```
##### Description

For OAuth2, this requires the identify scope, which will return the object without an email, and optionally the email scope, which returns the object with an email.

##### Parameters

No Parameters

##### Response

Returns the user object of the requester&#039;s account.

Can Return:
* user



---

## Get User - `getUser`

```php
$client->user->getUser($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
user.id | snowflake | false | *null*

##### Response

Returns a user for a given user ID.

Can Return:
* user



---

## Modify Current User - `modifyCurrentUser`

```php
$client->user->modifyCurrentUser($parameters);
```
##### Description

Modify the requestors user account settings.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
username | string | false | *null*
avatar | avatar data | false | *null*

##### Response

Returns a user object on success.

Can Return:
* user



---

## Get Current User Guilds - `getCurrentUserGuilds`

```php
$client->user->getCurrentUserGuilds($parameters);
```
##### Description

Requires the guilds OAuth2 scope.

##### Parameters

No Parameters

##### Response

Returns a list of user guild objects the current user is a member of.

Can Return:
* user guild



---

## Leave Guild - `leaveGuild`

```php
$client->user->leaveGuild($parameters);
```
##### Description

Leave a guild.

##### Parameters

No Parameters

##### Response

Returns a 204 empty response on success.




---

## Get User DMs - `getUserDms`

```php
$client->user->getUserDms($parameters);
```
##### Description



##### Parameters

No Parameters

##### Response

Returns a list of DM channel objects.

Can Return:
* DM



---

## Create DM - `createDm`

```php
$client->user->createDm($parameters);
```
##### Description

Create a new DM channel with a user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
recipient_id | snowflake | false | *null*

##### Response

Returns a DM channel object.

Can Return:
* DM channel



---

## Create Group DM - `createGroupDm`

```php
$client->user->createGroupDm($parameters);
```
##### Description

Create a new group DM channel with multiple users.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_tokens | array | false | *null*
nicks | dict | false | *null*

##### Response

Returns a DM channel object.

Can Return:
* DM channel



---

## Get Users Connections - `getUsersConnections`

```php
$client->user->getUsersConnections($parameters);
```
##### Description

Requires the connections OAuth2 scope.

##### Parameters

No Parameters

##### Response

Returns a list of connection objects.

Can Return:
* connection



---

