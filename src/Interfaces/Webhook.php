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
	 * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'avatar' => 'image data']
	 * @return array
	 */
	public function createWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#delete-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake']
	 * @return array
	 */
	public function deleteWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#delete-webhook-message
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'message.id' => 'snowflake', 'thread_id' => 'snowflake']
	 * @return array
	 */
	public function deleteWebhookMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#delete-webhook-with-token
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function deleteWebhookWithToken(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#edit-webhook-message
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'message.id' => 'snowflake', 'thread_id' => 'snowflake', 'content' => 'string', 'embeds' => 'array', 'allowed_mentions' => 'object', 'components' => 'array', 'files' => 'file contents', 'payload_json' => 'string', 'attachments' => 'array']
	 * @return array
	 */
	public function editWebhookMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-github-compatible-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'thread_id' => 'snowflake', 'wait' => 'boolean']
	 * @return array
	 */
	public function executeGithubCompatibleWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-slack-compatible-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'thread_id' => 'snowflake', 'wait' => 'boolean']
	 * @return array
	 */
	public function executeSlackCompatibleWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#execute-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'boolean', 'thread_id' => 'snowflake', 'content' => 'string', 'username' => 'string', 'avatar_url' => 'string', 'tts' => 'boolean', 'embeds' => 'array', 'allowed_mentions' => 'object', 'components' => 'array', 'files' => 'file contents', 'payload_json' => 'string', 'attachments' => 'array']
	 * @return array
	 */
	public function executeWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-channel-webhooks
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function getChannelWebhooks(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-guild-webhooks
	 *
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return array
	 */
	public function getGuildWebhooks(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake']
	 * @return array
	 */
	public function getWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-webhook-message
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'message.id' => 'snowflake', 'thread_id' => 'snowflake']
	 * @return array
	 */
	public function getWebhookMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#get-webhook-with-token
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function getWebhookWithToken(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#modify-webhook
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'name' => 'string', 'avatar' => 'image data', 'channel_id' => 'snowflake']
	 * @return array
	 */
	public function modifyWebhook(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/webhook#modify-webhook-with-token
	 *
	 * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
	 * @return array
	 */
	public function modifyWebhookWithToken(array $options);
}