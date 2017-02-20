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

namespace RestCord\Mock;

/**
 * Webhook Intellisense Helper.
 */
interface Webhook
{
    /**
     * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'avatar' => 'string']
     *
     * @return array Returns a webhook object on success.
     */
    public function createWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake']
     *
     * @return array Returns a 204 NO CONTENT response on success.
     */
    public function deleteWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
     *
     * @return array
     */
    public function deleteWebhookWithToken(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool']
     *
     * @return array
     */
    public function executeGithubcompatibleWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool']
     *
     * @return array
     */
    public function executeSlackcompatibleWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string', 'wait' => 'bool', 'content' => 'string', 'username' => 'string', 'avatar_url' => 'string', 'tts' => 'bool', 'file' => 'file contents', 'embeds' => 'array']
     *
     * @return array
     */
    public function executeWebhook(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns a list of channel webhook objects.
     */
    public function getChannelWebhooks(array $options);

    /**
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a list of guild webhook objects.
     */
    public function getGuildWebhooks(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake']
     *
     * @return array Returns the new webhook object for the given id.
     */
    public function getWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
     *
     * @return array
     */
    public function getWebhookWithToken(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'name' => 'string', 'avatar' => 'string']
     *
     * @return array Returns the updated webhook object on success.
     */
    public function modifyWebhook(array $options);

    /**
     * @param array $options ['webhook.id' => 'snowflake', 'webhook.token' => 'string']
     *
     * @return array
     */
    public function modifyWebhookWithToken(array $options);
}
