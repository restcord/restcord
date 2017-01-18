---
title: Documentation
layout: default
---

# Documentation

Documentation is currently broken down by category.

## Channel

### Get Channel - `getChannel`

```php
$client->channel->getChannel($parameters);
```
#### Description

Get a channel by ID.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns a guild channel or dm channel object.

Can Return:
* guild channel
* dm channel



---

### Modify Channel - `modifyChannel`

```php
$client->channel->modifyChannel($parameters);
```
#### Description

Update a channels settings. Requires the &#039;MANAGE_GUILD&#039; permission for the guild.  Fires a Channel Update Gateway event. For the PATCH method, all the JSON Params are optional.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
position | integer | false | *null*
topic | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
channel.id | snowflake | false | *null*

#### Response

Returns a guild channel on success, and a 400 BAD REQUEST on invalid parameters.

Can Return:
* guild channel



---

### Delete/Close Channel - `deletecloseChannel`

```php
$client->channel->deletecloseChannel($parameters);
```
#### Description

Delete a guild channel, or close a private message. Requires the &#039;MANAGE_CHANNELS&#039; permission for the guild.  Fires a Channel Delete Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns a guild channel or dm channel object on success.

Can Return:
* guild channel
* dm channel



---

### Get Channel Messages - `getChannelMessages`

```php
$client->channel->getChannelMessages($parameters);
```
#### Description

If operating on a guild channel, this endpoint requires the &#039;READ_MESSAGES&#039; permission to be present on the current user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
around | snowflake | false | absent
before | snowflake | false | absent
after | snowflake | false | absent
limit | integer | false | 50
channel.id | snowflake | false | *null*

#### Response

Returns the messages for a channel.




---

### Get Channel Message - `getChannelMessage`

```php
$client->channel->getChannelMessage($parameters);
```
#### Description

If operating on a guild channel, this endpoints requires the &#039;READ_MESSAGE_HISTORY&#039; permission to be present on the current user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Returns a specific message in the channel.




---

### Create Message - `createMessage`

```php
$client->channel->createMessage($parameters);
```
#### Description

Post a message to a guild text or DM channel. If operating on a guild channel, this endpoint requires the &#039;SEND_MESSAGES&#039; permission to be present on the current user.  Fires a Message Create Gateway event. See message formatting for more information on how to properly format messages.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
content | string | false | *null*
nonce | snowflake | false | *null*
tts | bool | false | *null*
file | file contents | false | *null*
embed | embed object | false | *null*
channel.id | snowflake | false | *null*

#### Response

Returns a message object.

Can Return:
* message



---

### Create Reaction - `createReaction`

```php
$client->channel->createReaction($parameters);
```
#### Description

Create a reaction for the message. If nobody else has reacted to the message using this emoji, this endpoint requires the &#039;ADD_REACTIONS&#039; permission to be present on the current user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Delete Own Reaction - `deleteOwnReaction`

```php
$client->channel->deleteOwnReaction($parameters);
```
#### Description

Delete a reaction the current user has made for the message.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Delete User Reaction - `deleteUserReaction`

```php
$client->channel->deleteUserReaction($parameters);
```
#### Description

Deletes another user&#039;s reaction. This endpoint requires the &#039;MANAGE_MESSAGES&#039; permission to be present on the current user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Reactions - `getReactions`

```php
$client->channel->getReactions($parameters);
```
#### Description

Get a list of users that reacted with this emoji.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*
emoji | string | false | *null*

#### Response

Returns an array of user objects on success.

Can Return:
* user



---

### Delete All Reactions - `deleteAllReactions`

```php
$client->channel->deleteAllReactions($parameters);
```
#### Description

Deletes all reactions on a message. This endpoint requires the &#039;MANAGE_MESSAGES&#039; permission to be present on the current user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Possibly No Response




---

### Edit Message - `editMessage`

```php
$client->channel->editMessage($parameters);
```
#### Description

Edit a previously sent message. You can only edit messages that have been sent by the current user.  Fires a Message Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
content | string | false | *null*
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Returns a message object.

Can Return:
* message



---

### Delete Message - `deleteMessage`

```php
$client->channel->deleteMessage($parameters);
```
#### Description

Delete a message. If operating on a guild channel and trying to delete a message that was not sent by the current user, this endpoint requires the &#039;MANAGE_MESSAGES&#039; permission.  Fires a Message Delete Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Bulk Delete Messages - `bulkDeleteMessages`

```php
$client->channel->bulkDeleteMessages($parameters);
```
#### Description

Delete multiple messages in a single request. This endpoint can only be used on guild channels and requires the &#039;MANAGE_MESSAGES&#039; permission.  Fires multiple Message Delete Gateway events.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
messages | array | false | *null*
channel.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Bulk Delete Messages (deprecated) - `bulkDeleteMessagesDeprecated`

```php
$client->channel->bulkDeleteMessagesDeprecated($parameters);
```
#### Description

Same as above, but this endpoint is deprecated.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Possibly No Response




---

### Edit Channel Permissions - `editChannelPermissions`

```php
$client->channel->editChannelPermissions($parameters);
```
#### Description

Edit the channel permission overwrites for a user or role in a channel. Only usable for guild channels. Requires the &#039;MANAGE_ROLES&#039; permission.  For more information about permissions, see permissions.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
allow | integer | false | *null*
deny | integer | false | *null*
type | string | false | *null*
channel.id | snowflake | false | *null*
overwrite.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Channel Invites - `getChannelInvites`

```php
$client->channel->getChannelInvites($parameters);
```
#### Description

Only usable for guild channels. Requires the &#039;MANAGE_CHANNELS&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns a list of invite objects (with invite metadata) for the channel.

Can Return:
* invite
* invite metadata



---

### Create Channel Invite - `createChannelInvite`

```php
$client->channel->createChannelInvite($parameters);
```
#### Description

Create a new invite object for the channel. Only usable for guild channels. Requires the CREATE_INSTANT_INVITE permission. All JSON paramaters for this route are optional, however the request body is not. If you are not sending any fields, you still have to send an empty JSON object ({}).

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
max_age | integer | false | 86400 (24 hours)
max_uses | integer | false | 0
temporary | bool | false | false
unique | bool | false | false
channel.id | snowflake | false | *null*

#### Response

Returns an invite object.

Can Return:
* invite



---

### Delete Channel Permission - `deleteChannelPermission`

```php
$client->channel->deleteChannelPermission($parameters);
```
#### Description

Delete a channel permission overwrite for a user or role in a channel. Only usable for guild channels. Requires the &#039;MANAGE_ROLES&#039; permission.  For more information about permissions, see permissions

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
overwrite.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Trigger Typing Indicator - `triggerTypingIndicator`

```php
$client->channel->triggerTypingIndicator($parameters);
```
#### Description

Post a typing indicator for the specified channel. Generally bots should not implement this route. However, if a bot is responding to a command and expects the computation to take a few seconds, this endpoint may be called to let the user know that the bot is processing their message.  Fires a Typing Start Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Pinned Messages - `getPinnedMessages`

```php
$client->channel->getPinnedMessages($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns all pinned messages in the channel as an array of message objects.

Can Return:
* message



---

### Add Pinned Channel Message - `addPinnedChannelMessage`

```php
$client->channel->addPinnedChannelMessage($parameters);
```
#### Description

Pin a message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Delete Pinned Channel Message - `deletePinnedChannelMessage`

```php
$client->channel->deletePinnedChannelMessage($parameters);
```
#### Description

Delete a pinned message in a channel. Requires the &#039;MANAGE_MESSAGES&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
message.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Group DM Add Recipient - `groupDmAddRecipient`

```php
$client->channel->groupDmAddRecipient($parameters);
```
#### Description

Adds a recipient to a Group DM using their access token

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_token | string | false | *null*
nick | string | false | *null*
channel.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Possibly No Response




---

### Group DM Remove Recipient - `groupDmRemoveRecipient`

```php
$client->channel->groupDmRemoveRecipient($parameters);
```
#### Description

Removes a recipient from a Group DM

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Possibly No Response




---

## Guild

### Create Guild - `createGuild`

```php
$client->guild->createGuild($parameters);
```
#### Description

Create a new guild.  Fires a Guild Create Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
icon | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
roles | array | false | *null*
channels | array | false | *null*

#### Response

Returns a guild object on success.

Can Return:
* guild



---

### Get Guild - `getGuild`

```php
$client->guild->getGuild($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns the new guild object for the given id.

Can Return:
* guild



---

### Modify Guild - `modifyGuild`

```php
$client->guild->modifyGuild($parameters);
```
#### Description

Modify a guild&#039;s settings.  Fires a Guild Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
afk_channel_id | snowflake | false | *null*
afk_timeout | integer | false | *null*
icon | string | false | *null*
owner_id | snowflake | false | *null*
splash | string | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns the updated guild object on success.

Can Return:
* guild



---

### Delete Guild - `deleteGuild`

```php
$client->guild->deleteGuild($parameters);
```
#### Description

Delete a guild permanently. User must be owner.  Fires a Guild Delete Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns the guild object on success.

Can Return:
* guild



---

### Get Guild Channels - `getGuildChannels`

```php
$client->guild->getGuildChannels($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of guild channel objects.

Can Return:
* channel



---

### Create Guild Channel - `createGuildChannel`

```php
$client->guild->createGuildChannel($parameters);
```
#### Description

Create a new channel object for the guild. Requires the &#039;MANAGE_CHANNELS&#039; permission.  Fires a Channel Create Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
type | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
permission_overwrites | array | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns the new channel object on success.

Can Return:
* channel



---

### Modify Guild Channel Positions - `modifyGuildChannelPositions`

```php
$client->guild->modifyGuildChannelPositions($parameters);
```
#### Description

Modify the positions of a set of channel objects for the guild. Requires &#039;MANAGE_CHANNELS&#039; permission.  Fires multiple Channel Update Gateway events.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
position | integer | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns a list of all of the guild&#039;s channel objects on success.

Can Return:
* channel



---

### Get Guild Member - `getGuildMember`

```php
$client->guild->getGuildMember($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a guild member object for the specified user.

Can Return:
* guild member



---

### List Guild Members - `listGuildMembers`

```php
$client->guild->listGuildMembers($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
limit | integer | false | 1
after | integer | false | 0
guild.id | snowflake | false | *null*

#### Response

Returns a list of guild member objects that are members of the guild.

Can Return:
* guild member



---

### Add Guild Member - `addGuildMember`

```php
$client->guild->addGuildMember($parameters);
```
#### Description

Adds a user to the guild, provided you have a valid oauth2 access token for the user with the guilds.join scope.  Fires a Guild Member Add Gateway event. Requires the bot to have the CREATE_INSTANT_INVITE permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_token | string | false | *null*
nick | string | false | *null*
roles | array | false | *null*
mute | bool | false | *null*
deaf | bool | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 201 Created with the guild member as the body.

Can Return:
* guild member



---

### Modify Guild Member - `modifyGuildMember`

```php
$client->guild->modifyGuildMember($parameters);
```
#### Description

Modify attributes of a guild member.  Fires a Guild Member Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
nick | string | false | *null*
roles | array | false | *null*
mute | bool | false | *null*
deaf | bool | false | *null*
channel_id | snowflake | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Add Guild Member Role - `addGuildMemberRole`

```php
$client->guild->addGuildMemberRole($parameters);
```
#### Description

Adds a role to a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*
role.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Remove Guild Member Role - `removeGuildMemberRole`

```php
$client->guild->removeGuildMemberRole($parameters);
```
#### Description

Removes a role from a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*
role.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Remove Guild Member - `removeGuildMember`

```php
$client->guild->removeGuildMember($parameters);
```
#### Description

Remove a member from a guild. Requires &#039;KICK_MEMBERS&#039; permission.  Fires a Guild Member Remove Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Guild Bans - `getGuildBans`

```php
$client->guild->getGuildBans($parameters);
```
#### Description

Requires the &#039;BAN_MEMBERS&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of user objects that are banned from this guild.

Can Return:
* user



---

### Create Guild Ban - `createGuildBan`

```php
$client->guild->createGuildBan($parameters);
```
#### Description

Create a guild ban, and optionally delete previous messages sent by the banned user. Requires the &#039;BAN_MEMBERS&#039; permission.  Fires a Guild Ban Add Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
delete-message-days | integer | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Remove Guild Ban - `removeGuildBan`

```php
$client->guild->removeGuildBan($parameters);
```
#### Description

Remove the ban for a user. Requires the &#039;BAN_MEMBERS&#039; permissions.  Fires a Guild Ban Remove Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Guild Roles - `getGuildRoles`

```php
$client->guild->getGuildRoles($parameters);
```
#### Description

Requires the &#039;MANAGE_ROLES&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of role objects for the guild.

Can Return:
* role



---

### Create Guild Role - `createGuildRole`

```php
$client->guild->createGuildRole($parameters);
```
#### Description

Create a new empty role object for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Create Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns the new role object on success.

Can Return:
* role



---

### Modify Guild Role Positions - `modifyGuildRolePositions`

```php
$client->guild->modifyGuildRolePositions($parameters);
```
#### Description

Modify the positions of a set of role objects for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires multiple Guild Role Update Gateway events.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
position | integer | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns a list of all of the guild&#039;s role objects on success.

Can Return:
* role



---

### Modify Guild Role - `modifyGuildRole`

```php
$client->guild->modifyGuildRole($parameters);
```
#### Description

Modify a guild role. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
permissions | integer | false | *null*
position | integer | false | *null*
color | integer | false | *null*
hoist | bool | false | *null*
mentionable | bool | false | *null*
guild.id | snowflake | false | *null*
role.id | string | false | *null*

#### Response

Returns the updated role on success.

Can Return:
* role



---

### Delete Guild Role - `deleteGuildRole`

```php
$client->guild->deleteGuildRole($parameters);
```
#### Description

Delete a guild role. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Delete Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
role.id | string | false | *null*

#### Response

Returns the role on success.

Can Return:
* role



---

### Get Guild Prune Count - `getGuildPruneCount`

```php
$client->guild->getGuildPruneCount($parameters);
```
#### Description

Requires the &#039;KICK_MEMBERS&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
days | integer | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that would be removed in a prune operation.




---

### Begin Guild Prune - `beginGuildPrune`

```php
$client->guild->beginGuildPrune($parameters);
```
#### Description

Begin a prune operation. Requires the &#039;KICK_MEMBERS&#039; permission.  Fires multiple Guild Member Remove Gateway events.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
days | integer | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that were removed in the prune operation.




---

### Get Guild Voice Regions - `getGuildVoiceRegions`

```php
$client->guild->getGuildVoiceRegions($parameters);
```
#### Description

Unlike the similar /voice route, this returns VIP servers when the guild is VIP-enabled.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of voice region objects for the guild.

Can Return:
* voice region



---

### Get Guild Invites - `getGuildInvites`

```php
$client->guild->getGuildInvites($parameters);
```
#### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of invite objects (with invite metadata) for the guild.

Can Return:
* invite
* invite metadata



---

### Get Guild Integrations - `getGuildIntegrations`

```php
$client->guild->getGuildIntegrations($parameters);
```
#### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of integration objects for the guild.

Can Return:
* integration



---

### Create Guild Integration - `createGuildIntegration`

```php
$client->guild->createGuildIntegration($parameters);
```
#### Description

Attach an integration object from the current user to the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
type | string | false | *null*
id | snowflake | false | *null*
guild.id | snowflake | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Modify Guild Integration - `modifyGuildIntegration`

```php
$client->guild->modifyGuildIntegration($parameters);
```
#### Description

Modify the behavior and settings of a integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
expire_behavior | integer | false | *null*
expire_grace_period | integer | false | *null*
enable_emoticons | bool | false | *null*
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Delete Guild Integration - `deleteGuildIntegration`

```php
$client->guild->deleteGuildIntegration($parameters);
```
#### Description

Delete the attached integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Sync Guild Integration - `syncGuildIntegration`

```php
$client->guild->syncGuildIntegration($parameters);
```
#### Description

Sync an integration. Requires the &#039;MANAGE_GUILD&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

#### Response

Returns a 204 empty response on success.




---

### Get Guild Embed - `getGuildEmbed`

```php
$client->guild->getGuildEmbed($parameters);
```
#### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns the guild embed object.

Can Return:
* guild embed



---

### Modify Guild Embed - `modifyGuildEmbed`

```php
$client->guild->modifyGuildEmbed($parameters);
```
#### Description

Modify a guild embed object for the guild. All attributes may be passed in with JSON and modified. Requires the &#039;MANAGE_GUILD&#039; permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns the updated guild embed object.

Can Return:
* guild embed



---

## Invite

### Get Invite - `getInvite`

```php
$client->invite->getInvite($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

#### Response

Returns an invite object for the given code.

Can Return:
* invite object



---

### Delete Invite - `deleteInvite`

```php
$client->invite->deleteInvite($parameters);
```
#### Description

Delete an invite. Requires the MANAGE_CHANNELS permission.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

#### Response

Returns an invite object on success.

Can Return:
* invite object



---

### Accept Invite - `acceptInvite`

```php
$client->invite->acceptInvite($parameters);
```
#### Description

Accept an invite. This is not available to bot accounts, and requires the guilds.join OAuth2 scope to accept on behalf of normal users.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
invite.code | string | false | *null*

#### Response

Returns an invite object on success.

Can Return:
* invite object



---

## User

### Get Current User - `getCurrentUser`

```php
$client->user->getCurrentUser($parameters);
```
#### Description

For OAuth2, this requires the identify scope, which will return the object without an email, and optionally the email scope, which returns the object with an email.

#### Parameters

No Parameters

#### Response

Returns the user object of the requester&#039;s account.

Can Return:
* user



---

### Get User - `getUser`

```php
$client->user->getUser($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
user.id | snowflake | false | *null*

#### Response

Returns a user for a given user ID.

Can Return:
* user



---

### Modify Current User - `modifyCurrentUser`

```php
$client->user->modifyCurrentUser($parameters);
```
#### Description

Modify the requestors user account settings.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
username | string | false | *null*
avatar | avatar data | false | *null*

#### Response

Returns a user object on success.

Can Return:
* user



---

### Get Current User Guilds - `getCurrentUserGuilds`

```php
$client->user->getCurrentUserGuilds($parameters);
```
#### Description

Requires the guilds OAuth2 scope.

#### Parameters

No Parameters

#### Response

Returns a list of user guild objects the current user is a member of.

Can Return:
* user guild



---

### Leave Guild - `leaveGuild`

```php
$client->user->leaveGuild($parameters);
```
#### Description

Leave a guild.

#### Parameters

No Parameters

#### Response

Returns a 204 empty response on success.




---

### Get User DMs - `getUserDms`

```php
$client->user->getUserDms($parameters);
```
#### Description



#### Parameters

No Parameters

#### Response

Returns a list of DM channel objects.

Can Return:
* DM



---

### Create DM - `createDm`

```php
$client->user->createDm($parameters);
```
#### Description

Create a new DM channel with a user.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
recipient_id | snowflake | false | *null*

#### Response

Returns a DM channel object.

Can Return:
* DM channel



---

### Create Group DM - `createGroupDm`

```php
$client->user->createGroupDm($parameters);
```
#### Description

Create a new group DM channel with multiple users.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_tokens | array | false | *null*
nicks | dict | false | *null*

#### Response

Returns a DM channel object.

Can Return:
* DM channel



---

### Get Users Connections - `getUsersConnections`

```php
$client->user->getUsersConnections($parameters);
```
#### Description

Requires the connections OAuth2 scope.

#### Parameters

No Parameters

#### Response

Returns a list of connection objects.

Can Return:
* connection



---

## Voice

### List Voice Regions - `listVoiceRegions`

```php
$client->voice->listVoiceRegions($parameters);
```
#### Description



#### Parameters

No Parameters

#### Response

Returns an array of voice region objects that can be used when creating servers.

Can Return:
* voice region



---

## Webhook

### Create Webhook - `createWebhook`

```php
$client->webhook->createWebhook($parameters);
```
#### Description

Create a new webhook.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
avatar | string | false | *null*
channel.id | snowflake | false | *null*

#### Response

Returns a webhook object on success.

Can Return:
* webhook



---

### Get Channel Webhooks - `getChannelWebhooks`

```php
$client->webhook->getChannelWebhooks($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

#### Response

Returns a list of channel webhook objects.

Can Return:
* webhook



---

### Get Guild Webhooks - `getGuildWebhooks`

```php
$client->webhook->getGuildWebhooks($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

#### Response

Returns a list of guild webhook objects.

Can Return:
* webhook



---

### Get Webhook - `getWebhook`

```php
$client->webhook->getWebhook($parameters);
```
#### Description



#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*

#### Response

Returns the new webhook object for the given id.

Can Return:
* webhook



---

### Get Webhook with Token - `getWebhookWithToken`

```php
$client->webhook->getWebhookWithToken($parameters);
```
#### Description

Same as above, except this call does not require authentication and returns no user in the webhook object.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

### Modify Webhook - `modifyWebhook`

```php
$client->webhook->modifyWebhook($parameters);
```
#### Description

Modify a webhook.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
avatar | string | false | *null*
webhook.id | string | false | *null*

#### Response

Returns the updated webhook object on success.

Can Return:
* webhook



---

### Modify Webhook with Token - `modifyWebhookWithToken`

```php
$client->webhook->modifyWebhookWithToken($parameters);
```
#### Description

Same as above, except this call does not require authentication and returns no user in the webhook object.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

### Delete Webhook - `deleteWebhook`

```php
$client->webhook->deleteWebhook($parameters);
```
#### Description

Delete a webhook permanently. User must be owner.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*

#### Response

Returns a 204 NO CONTENT response on success.




---

### Delete Webhook with Token - `deleteWebhookWithToken`

```php
$client->webhook->deleteWebhookWithToken($parameters);
```
#### Description

Same as above, except this call does not require authentication.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

### Execute Webhook - `executeWebhook`

```php
$client->webhook->executeWebhook($parameters);
```
#### Description

This endpoint supports both JSON and form data bodies. It does require multipart/form-data requests instead of the normal JSON request type when uploading files. Make sure you set your Content-Type to multipart/form-data if you&#039;re doing that. Note that in that case, the embeds field cannot be used, but you can pass an url-encoded JSON body as a form value for payload_json.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

### Execute Slack-Compatible Webhook - `executeSlackcompatibleWebhook`

```php
$client->webhook->executeSlackcompatibleWebhook($parameters);
```
#### Description

Refer to Slack&#039;s documentation for more information. We do not support Slack&#039;s channel, icon_emoji, mrkdwn, or mrkdwn_in properties.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

### Execute GitHub-Compatible Webhook - `executeGithubcompatibleWebhook`

```php
$client->webhook->executeGithubcompatibleWebhook($parameters);
```
#### Description

Add a new webhook to your GitHub repo (in the repo&#039;s settings), and use this endpoint as the &quot;Payload URL.&quot; You can choose what events your Discord channel receives by choosing the &quot;Let me select individual events&quot; option and selecting individual events for the new webhook you&#039;re configuring.

#### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

#### Response

Possibly No Response




---

## Gateway

### Get Gateway - `getGateway`

```php
$client->gateway->getGateway($parameters);
```
#### Description

Bots that want to dynamically/automatically spawn shard processes should use this endpoint to determine the number of processes to run. This route should be called once, and the result cached/passed to all processes. This value is not guarenteed to be the same per-call.

#### Parameters

No Parameters

#### Response

Returns an object with the same information as Get Gateway, plus a shards key, containing the recommended number of shards to connect with (as an integer).




---

## Oauth2

### Get Current Application Information - `getCurrentApplicationInformation`

```php
$client->oauth2->getCurrentApplicationInformation($parameters);
```
#### Description



#### Parameters

No Parameters

#### Response

Returns the bot&#039;s OAuth2 application info.




---

