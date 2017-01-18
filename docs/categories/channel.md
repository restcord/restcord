# Channel

## Get Channel - `getChannel`

```php
$client->channel->getChannel($parameters);
```
##### Description

Get a channel by ID.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns a guild channel or dm channel object.

Can Return:
* guild channel
* dm channel



---

## Modify Channel - `modifyChannel`

```php
$client->channel->modifyChannel($parameters);
```
##### Description

Update a channels settings. Requires the &#039;MANAGE_GUILD&#039; permission for the guild.  Fires a Channel Update Gateway event. For the PATCH method, all the JSON Params are optional.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
position | integer | false | *null*
topic | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
channel.id | snowflake | false | *null*

##### Response

Returns a guild channel on success, and a 400 BAD REQUEST on invalid parameters.

Can Return:
* guild channel



---

## Delete/Close Channel - `deletecloseChannel`

```php
$client->channel->deletecloseChannel($parameters);
```
##### Description

Delete a guild channel, or close a private message. Requires the &#039;MANAGE_CHANNELS&#039; permission for the guild.  Fires a Channel Delete Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns a guild channel or dm channel object on success.

Can Return:
* guild channel
* dm channel



---

## Get Channel Messages - `getChannelMessages`

```php
$client->channel->getChannelMessages($parameters);
```
##### Description

If operating on a guild channel, this endpoint requires the &#039;READ_MESSAGES&#039; permission to be present on the current user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
around | snowflake | false | absent
before | snowflake | false | absent
after | snowflake | false | absent
limit | integer | false | 50
channel.id | snowflake | false | *null*

##### Response

Returns the messages for a channel.




---

## Get Channel Message - `getChannelMessage`

```php
$client->channel->getChannelMessage($parameters);
```
##### Description

If operating on a guild channel, this endpoints requires the &#039;READ_MESSAGE_HISTORY&#039; permission to be present on the current user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Returns a specific message in the channel.




---

## Create Message - `createMessage`

```php
$client->channel->createMessage($parameters);
```
##### Description

Post a message to a guild text or DM channel. If operating on a guild channel, this endpoint requires the &#039;SEND_MESSAGES&#039; permission to be present on the current user.  Fires a Message Create Gateway event. See message formatting for more information on how to properly format messages.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
content | string | false | *null*
nonce | snowflake | false | *null*
tts | bool | false | *null*
file | file contents | false | *null*
embed | embed object | false | *null*
channel.id | snowflake | false | *null*

##### Response

Returns a message object.

Can Return:
* message



---

## Create Reaction - `createReaction`

```php
$client->channel->createReaction($parameters);
```
##### Description

Create a reaction for the message. If nobody else has reacted to the message using this emoji, this endpoint requires the &#039;ADD_REACTIONS&#039; permission to be present on the current user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Delete Own Reaction - `deleteOwnReaction`

```php
$client->channel->deleteOwnReaction($parameters);
```
##### Description

Delete a reaction the current user has made for the message.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Delete User Reaction - `deleteUserReaction`

```php
$client->channel->deleteUserReaction($parameters);
```
##### Description

Deletes another user&#039;s reaction. This endpoint requires the &#039;MANAGE_MESSAGES&#039; permission to be present on the current user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Reactions - `getReactions`

```php
$client->channel->getReactions($parameters);
```
##### Description

Get a list of users that reacted with this emoji.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

##### Response

Returns an array of user objects on success.

Can Return:
* user



---

## Delete All Reactions - `deleteAllReactions`

```php
$client->channel->deleteAllReactions($parameters);
```
##### Description

Deletes all reactions on a message. This endpoint requires the &#039;MANAGE_MESSAGES&#039; permission to be present on the current user.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Possibly No Response




---

## Edit Message - `editMessage`

```php
$client->channel->editMessage($parameters);
```
##### Description

Edit a previously sent message. You can only edit messages that have been sent by the current user.  Fires a Message Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
content | string | false | *null*
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Returns a message object.

Can Return:
* message



---

## Delete Message - `deleteMessage`

```php
$client->channel->deleteMessage($parameters);
```
##### Description

Delete a message. If operating on a guild channel and trying to delete a message that was not sent by the current user, this endpoint requires the &#039;MANAGE_MESSAGES&#039; permission.  Fires a Message Delete Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Bulk Delete Messages - `bulkDeleteMessages`

```php
$client->channel->bulkDeleteMessages($parameters);
```
##### Description

Delete multiple messages in a single request. This endpoint can only be used on guild channels and requires the &#039;MANAGE_MESSAGES&#039; permission.  Fires multiple Message Delete Gateway events.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
messages | array | false | *null*
channel.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Bulk Delete Messages (deprecated) - `bulkDeleteMessagesDeprecated`

```php
$client->channel->bulkDeleteMessagesDeprecated($parameters);
```
##### Description

Same as above, but this endpoint is deprecated.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Possibly No Response




---

## Edit Channel Permissions - `editChannelPermissions`

```php
$client->channel->editChannelPermissions($parameters);
```
##### Description

Edit the channel permission overwrites for a user or role in a channel. Only usable for guild channels. Requires the &#039;MANAGE_ROLES&#039; permission.  For more information about permissions, see permissions.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
allow | integer | false | *null*
deny | integer | false | *null*
type | string | false | *null*
channel.id | snowflake | false | *null*
overwrite.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Channel Invites - `getChannelInvites`

```php
$client->channel->getChannelInvites($parameters);
```
##### Description

Only usable for guild channels. Requires the &#039;MANAGE_CHANNELS&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns a list of invite objects (with invite metadata) for the channel.

Can Return:
* invite
* invite metadata



---

## Create Channel Invite - `createChannelInvite`

```php
$client->channel->createChannelInvite($parameters);
```
##### Description

Create a new invite object for the channel. Only usable for guild channels. Requires the CREATE_INSTANT_INVITE permission. All JSON paramaters for this route are optional, however the request body is not. If you are not sending any fields, you still have to send an empty JSON object ({}).

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
max_age | integer | false | 86400 (24 hours)
max_uses | integer | false | 0
temporary | bool | false | false
unique | bool | false | false
channel.id | snowflake | false | *null*

##### Response

Returns an invite object.

Can Return:
* invite



---

## Delete Channel Permission - `deleteChannelPermission`

```php
$client->channel->deleteChannelPermission($parameters);
```
##### Description

Delete a channel permission overwrite for a user or role in a channel. Only usable for guild channels. Requires the &#039;MANAGE_ROLES&#039; permission.  For more information about permissions, see permissions

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
overwrite.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Trigger Typing Indicator - `triggerTypingIndicator`

```php
$client->channel->triggerTypingIndicator($parameters);
```
##### Description

Post a typing indicator for the specified channel. Generally bots should not implement this route. However, if a bot is responding to a command and expects the computation to take a few seconds, this endpoint may be called to let the user know that the bot is processing their message.  Fires a Typing Start Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Pinned Messages - `getPinnedMessages`

```php
$client->channel->getPinnedMessages($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns all pinned messages in the channel as an array of message objects.

Can Return:
* message



---

## Add Pinned Channel Message - `addPinnedChannelMessage`

```php
$client->channel->addPinnedChannelMessage($parameters);
```
##### Description

Pin a message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Delete Pinned Channel Message - `deletePinnedChannelMessage`

```php
$client->channel->deletePinnedChannelMessage($parameters);
```
##### Description

Delete a pinned message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Group DM Add Recipient - `groupDmAddRecipient`

```php
$client->channel->groupDmAddRecipient($parameters);
```
##### Description

Adds a recipient to a Group DM using their access token

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_token | string | false | *null*
nick | string | false | *null*
channel.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Possibly No Response




---

## Group DM Remove Recipient - `groupDmRemoveRecipient`

```php
$client->channel->groupDmRemoveRecipient($parameters);
```
##### Description

Removes a recipient from a Group DM

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Possibly No Response




---

