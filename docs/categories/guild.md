# Guild

## Create Guild - `createGuild`

```php
$client->guild->createGuild($parameters);
```
##### Description

Create a new guild.  Fires a Guild Create Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
region | string | false | *null*
icon | string | false | *null*
verification_level | integer | false | *null*
default_message_notifications | integer | false | *null*
roles | array | false | *null*
channels | array | false | *null*

##### Response

Returns a guild object on success.

Can Return:
* guild



---

## Get Guild - `getGuild`

```php
$client->guild->getGuild($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns the new guild object for the given id.

Can Return:
* guild



---

## Modify Guild - `modifyGuild`

```php
$client->guild->modifyGuild($parameters);
```
##### Description

Modify a guild&#039;s settings.  Fires a Guild Update Gateway event.

##### Parameters


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

##### Response

Returns the updated guild object on success.

Can Return:
* guild



---

## Delete Guild - `deleteGuild`

```php
$client->guild->deleteGuild($parameters);
```
##### Description

Delete a guild permanently. User must be owner.  Fires a Guild Delete Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns the guild object on success.

Can Return:
* guild



---

## Get Guild Channels - `getGuildChannels`

```php
$client->guild->getGuildChannels($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of guild channel objects.

Can Return:
* channel



---

## Create Guild Channel - `createGuildChannel`

```php
$client->guild->createGuildChannel($parameters);
```
##### Description

Create a new channel object for the guild. Requires the &#039;MANAGE_CHANNELS&#039; permission.  Fires a Channel Create Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
type | string | false | *null*
bitrate | integer | false | *null*
user_limit | integer | false | *null*
permission_overwrites | array | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns the new channel object on success.

Can Return:
* channel



---

## Modify Guild Channel Positions - `modifyGuildChannelPositions`

```php
$client->guild->modifyGuildChannelPositions($parameters);
```
##### Description

Modify the positions of a set of channel objects for the guild. Requires &#039;MANAGE_CHANNELS&#039; permission.  Fires multiple Channel Update Gateway events.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
position | integer | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns a list of all of the guild&#039;s channel objects on success.

Can Return:
* channel



---

## Get Guild Member - `getGuildMember`

```php
$client->guild->getGuildMember($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a guild member object for the specified user.

Can Return:
* guild member



---

## List Guild Members - `listGuildMembers`

```php
$client->guild->listGuildMembers($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
limit | integer | false | 1
after | integer | false | 0
guild.id | snowflake | false | *null*

##### Response

Returns a list of guild member objects that are members of the guild.

Can Return:
* guild member



---

## Add Guild Member - `addGuildMember`

```php
$client->guild->addGuildMember($parameters);
```
##### Description

Adds a user to the guild, provided you have a valid oauth2 access token for the user with the guilds.join scope.  Fires a Guild Member Add Gateway event. Requires the bot to have the CREATE_INSTANT_INVITE permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
access_token | string | false | *null*
nick | string | false | *null*
roles | array | false | *null*
mute | bool | false | *null*
deaf | bool | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 201 Created with the guild member as the body.

Can Return:
* guild member



---

## Modify Guild Member - `modifyGuildMember`

```php
$client->guild->modifyGuildMember($parameters);
```
##### Description

Modify attributes of a guild member.  Fires a Guild Member Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
nick | string | false | *null*
roles | array | false | *null*
mute | bool | false | *null*
deaf | bool | false | *null*
channel_id | snowflake | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Add Guild Member Role - `addGuildMemberRole`

```php
$client->guild->addGuildMemberRole($parameters);
```
##### Description

Adds a role to a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*
role.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Remove Guild Member Role - `removeGuildMemberRole`

```php
$client->guild->removeGuildMemberRole($parameters);
```
##### Description

Removes a role from a guild member. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Member Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*
role.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Remove Guild Member - `removeGuildMember`

```php
$client->guild->removeGuildMember($parameters);
```
##### Description

Remove a member from a guild. Requires &#039;KICK_MEMBERS&#039; permission.  Fires a Guild Member Remove Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Guild Bans - `getGuildBans`

```php
$client->guild->getGuildBans($parameters);
```
##### Description

Requires the &#039;BAN_MEMBERS&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of user objects that are banned from this guild.

Can Return:
* user



---

## Create Guild Ban - `createGuildBan`

```php
$client->guild->createGuildBan($parameters);
```
##### Description

Create a guild ban, and optionally delete previous messages sent by the banned user. Requires the &#039;BAN_MEMBERS&#039; permission.  Fires a Guild Ban Add Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
delete-message-days | integer | false | *null*
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Remove Guild Ban - `removeGuildBan`

```php
$client->guild->removeGuildBan($parameters);
```
##### Description

Remove the ban for a user. Requires the &#039;BAN_MEMBERS&#039; permissions.  Fires a Guild Ban Remove Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
user.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Guild Roles - `getGuildRoles`

```php
$client->guild->getGuildRoles($parameters);
```
##### Description

Requires the &#039;MANAGE_ROLES&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of role objects for the guild.

Can Return:
* role



---

## Create Guild Role - `createGuildRole`

```php
$client->guild->createGuildRole($parameters);
```
##### Description

Create a new empty role object for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Create Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns the new role object on success.

Can Return:
* role



---

## Modify Guild Role Positions - `modifyGuildRolePositions`

```php
$client->guild->modifyGuildRolePositions($parameters);
```
##### Description

Modify the positions of a set of role objects for the guild. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires multiple Guild Role Update Gateway events.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
id | snowflake | false | *null*
position | integer | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns a list of all of the guild&#039;s role objects on success.

Can Return:
* role



---

## Modify Guild Role - `modifyGuildRole`

```php
$client->guild->modifyGuildRole($parameters);
```
##### Description

Modify a guild role. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Update Gateway event.

##### Parameters


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

##### Response

Returns the updated role on success.

Can Return:
* role



---

## Delete Guild Role - `deleteGuildRole`

```php
$client->guild->deleteGuildRole($parameters);
```
##### Description

Delete a guild role. Requires the &#039;MANAGE_ROLES&#039; permission.  Fires a Guild Role Delete Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
role.id | string | false | *null*

##### Response

Returns the role on success.

Can Return:
* role



---

## Get Guild Prune Count - `getGuildPruneCount`

```php
$client->guild->getGuildPruneCount($parameters);
```
##### Description

Requires the &#039;KICK_MEMBERS&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
days | integer | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that would be removed in a prune operation.




---

## Begin Guild Prune - `beginGuildPrune`

```php
$client->guild->beginGuildPrune($parameters);
```
##### Description

Begin a prune operation. Requires the &#039;KICK_MEMBERS&#039; permission.  Fires multiple Guild Member Remove Gateway events.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
days | integer | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns an object with one &#039;pruned&#039; key indicating the number of members that were removed in the prune operation.




---

## Get Guild Voice Regions - `getGuildVoiceRegions`

```php
$client->guild->getGuildVoiceRegions($parameters);
```
##### Description

Unlike the similar /voice route, this returns VIP servers when the guild is VIP-enabled.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of voice region objects for the guild.

Can Return:
* voice region



---

## Get Guild Invites - `getGuildInvites`

```php
$client->guild->getGuildInvites($parameters);
```
##### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of invite objects (with invite metadata) for the guild.

Can Return:
* invite
* invite metadata



---

## Get Guild Integrations - `getGuildIntegrations`

```php
$client->guild->getGuildIntegrations($parameters);
```
##### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of integration objects for the guild.

Can Return:
* integration



---

## Create Guild Integration - `createGuildIntegration`

```php
$client->guild->createGuildIntegration($parameters);
```
##### Description

Attach an integration object from the current user to the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
type | string | false | *null*
id | snowflake | false | *null*
guild.id | snowflake | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Modify Guild Integration - `modifyGuildIntegration`

```php
$client->guild->modifyGuildIntegration($parameters);
```
##### Description

Modify the behavior and settings of a integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
expire_behavior | integer | false | *null*
expire_grace_period | integer | false | *null*
enable_emoticons | bool | false | *null*
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Delete Guild Integration - `deleteGuildIntegration`

```php
$client->guild->deleteGuildIntegration($parameters);
```
##### Description

Delete the attached integration object for the guild. Requires the &#039;MANAGE_GUILD&#039; permission.  Fires a Guild Integrations Update Gateway event.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Sync Guild Integration - `syncGuildIntegration`

```php
$client->guild->syncGuildIntegration($parameters);
```
##### Description

Sync an integration. Requires the &#039;MANAGE_GUILD&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*
integration.id | string | false | *null*

##### Response

Returns a 204 empty response on success.




---

## Get Guild Embed - `getGuildEmbed`

```php
$client->guild->getGuildEmbed($parameters);
```
##### Description

Requires the &#039;MANAGE_GUILD&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns the guild embed object.

Can Return:
* guild embed



---

## Modify Guild Embed - `modifyGuildEmbed`

```php
$client->guild->modifyGuildEmbed($parameters);
```
##### Description

Modify a guild embed object for the guild. All attributes may be passed in with JSON and modified. Requires the &#039;MANAGE_GUILD&#039; permission.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns the updated guild embed object.

Can Return:
* guild embed



---

