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

class User extends GuzzleClient
{

    /**
     * @param array $options
     *
     * @return array
     */
    public function getCurrentUser(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options user.id
     *
     * @return array
     */
    public function getUser(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options username, avatar
     *
     * @return array
     */
    public function modifyCurrentUser(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options before, after, limit
     *
     * @return array
     */
    public function getCurrentUserGuilds(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options
     *
     * @return array
     */
    public function leaveGuild(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options
     *
     * @return array
     */
    public function getUserDms(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options recipient_id
     *
     * @return array
     */
    public function createDm(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options access_tokens, nicks
     *
     * @return array
     */
    public function createGroupDm(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options
     *
     * @return array
     */
    public function getUsersConnections(array $options)
    {
        return $options;
    }
    
}
