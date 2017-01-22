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

namespace Restcord\Mock;

use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Webhook extends GuzzleClient
{

    /**
     * @param array $options name, avatar, channel.id
     *
     * @return array
     */
    public function createWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function getChannelWebhooks(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildWebhooks(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options webhook.id
     *
     * @return array
     */
    public function getWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options webhook.id, webhook.token
     *
     * @return array
     */
    public function getWebhookWithToken(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, avatar, webhook.id
     *
     * @return array
     */
    public function modifyWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options webhook.id, webhook.token
     *
     * @return array
     */
    public function modifyWebhookWithToken(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options webhook.id
     *
     * @return array
     */
    public function deleteWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options webhook.id, webhook.token
     *
     * @return array
     */
    public function deleteWebhookWithToken(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options wait, webhook.id, webhook.token
     *
     * @return array
     */
    public function executeWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options wait, webhook.id, webhook.token
     *
     * @return array
     */
    public function executeSlackcompatibleWebhook(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options wait, webhook.id, webhook.token
     *
     * @return array
     */
    public function executeGithubcompatibleWebhook(array $options)
    {
        return $options;
    }
    
}
