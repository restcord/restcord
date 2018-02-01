<?php

/*
 * Copyright 2017 Aaron Scherer
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 *
 * @package     restcord/restcord
 * @copyright   Aaron Scherer 2017
 * @license     MIT
 */

namespace RestCord\Interfaces;

/**
 * Webhook Intellisense Helper
 */
interface Webhook {

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#create-webhook
	 * 
	 * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'avatar' => 'avatar data string']
	 * @return \RestCord\Model\Webhook\Webhook Returns a webhook object on success.
	 */
	public function CreateWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#delete-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake']
	 * @return array Returns a 204 NO CONTENT response on success.
	 */
	public function DeleteWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#delete-webhook-with-token
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function DeleteWebhookWithToken(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-github-compatible-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool']
	 * @return array
	 */
	public function ExecuteGithubCompatibleWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-slack-compatible-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool']
	 * @return array
	 */
	public function ExecuteSlackCompatibleWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool', 'content' => 'string', 'username' => 'string', 'avatar_url' => 'string', 'tts' => 'bool', 'file' => 'file contents', 'embeds' => 'array']
	 * @return array
	 */
	public function ExecuteWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-channel-webhooks
	 * 
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return \RestCord\Model\Webhook\Webhook[] Returns a list of channel webhook objects.
	 */
	public function GetChannelWebhooks(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-guild-webhooks
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\Webhook\Webhook[] Returns a list of guild webhook objects.
	 */
	public function GetGuildWebhooks(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake']
	 * @return \RestCord\Model\Webhook\Webhook Returns the new webhook object for the given id.
	 */
	public function GetWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-webhook-with-token
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function GetWebhookWithToken(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#modify-webhook
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'name' => 'string', 'avatar' => 'avatar data string', 'channel_id' => 'snowflake']
	 * @return \RestCord\Model\Webhook\Webhook Returns the updated webhook object on success.
	 */
	public function ModifyWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#modify-webhook-with-token
	 * 
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function ModifyWebhookWithToken(array $options);
}