# Webhook

## Create Webhook - `createWebhook`

```php
$client->webhook->createWebhook($parameters);
```
##### Description

Create a new webhook.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
avatar | string | false | *null*
channel.id | snowflake | false | *null*

##### Response

Returns a webhook object on success.

Can Return:
* webhook



---

## Get Channel Webhooks - `getChannelWebhooks`

```php
$client->webhook->getChannelWebhooks($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
channel.id | snowflake | false | *null*

##### Response

Returns a list of channel webhook objects.

Can Return:
* webhook



---

## Get Guild Webhooks - `getGuildWebhooks`

```php
$client->webhook->getGuildWebhooks($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
guild.id | snowflake | false | *null*

##### Response

Returns a list of guild webhook objects.

Can Return:
* webhook



---

## Get Webhook - `getWebhook`

```php
$client->webhook->getWebhook($parameters);
```
##### Description



##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*

##### Response

Returns the new webhook object for the given id.

Can Return:
* webhook



---

## Get Webhook with Token - `getWebhookWithToken`

```php
$client->webhook->getWebhookWithToken($parameters);
```
##### Description

Same as above, except this call does not require authentication and returns no user in the webhook object.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

## Modify Webhook - `modifyWebhook`

```php
$client->webhook->modifyWebhook($parameters);
```
##### Description

Modify a webhook.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
name | string | false | *null*
avatar | string | false | *null*
webhook.id | string | false | *null*

##### Response

Returns the updated webhook object on success.

Can Return:
* webhook



---

## Modify Webhook with Token - `modifyWebhookWithToken`

```php
$client->webhook->modifyWebhookWithToken($parameters);
```
##### Description

Same as above, except this call does not require authentication and returns no user in the webhook object.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

## Delete Webhook - `deleteWebhook`

```php
$client->webhook->deleteWebhook($parameters);
```
##### Description

Delete a webhook permanently. User must be owner.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*

##### Response

Returns a 204 NO CONTENT response on success.




---

## Delete Webhook with Token - `deleteWebhookWithToken`

```php
$client->webhook->deleteWebhookWithToken($parameters);
```
##### Description

Same as above, except this call does not require authentication.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

## Execute Webhook - `executeWebhook`

```php
$client->webhook->executeWebhook($parameters);
```
##### Description

This endpoint supports both JSON and form data bodies. It does require multipart/form-data requests instead of the normal JSON request type when uploading files. Make sure you set your Content-Type to multipart/form-data if you&#039;re doing that. Note that in that case, the embeds field cannot be used, but you can pass an url-encoded JSON body as a form value for payload_json.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

## Execute Slack-Compatible Webhook - `executeSlackcompatibleWebhook`

```php
$client->webhook->executeSlackcompatibleWebhook($parameters);
```
##### Description

Refer to Slack&#039;s documentation for more information. We do not support Slack&#039;s channel, icon_emoji, mrkdwn, or mrkdwn_in properties.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

## Execute GitHub-Compatible Webhook - `executeGithubcompatibleWebhook`

```php
$client->webhook->executeGithubcompatibleWebhook($parameters);
```
##### Description

Add a new webhook to your GitHub repo (in the repo&#039;s settings), and use this endpoint as the &quot;Payload URL.&quot; You can choose what events your Discord channel receives by choosing the &quot;Let me select individual events&quot; option and selecting individual events for the new webhook you&#039;re configuring.

##### Parameters


Name | Type | Required | Default
--- | --- | --- | ---
wait | bool | false | *null*
webhook.id | string | false | *null*
webhook.token | string | false | *null*

##### Response

Possibly No Response




---

