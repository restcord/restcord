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
 * User Intellisense Helper.
 */
interface User
{
    /**
     * @param array $options ['recipient_id' => 'snowflake']
     *
     * @return array Returns a DM channel object.
     */
    public function createDm(array $options);

    /**
     * @param array $options ['access_tokens' => 'array', 'nicks' => 'dict']
     *
     * @return array Returns a DM channel object.
     */
    public function createGroupDm(array $options);

    /**
     * @param array $options []
     *
     * @return array Returns the user object of the requester's account.
     */
    public function getCurrentUser(array $options);

    /**
     * @param array $options ['before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
     *
     * @return array Returns a list of user guild objects the current user is a member of.
     */
    public function getCurrentUserGuilds(array $options);

    /**
     * @param array $options ['user.id' => 'snowflake']
     *
     * @return array Returns a user for a given user ID.
     */
    public function getUser(array $options);

    /**
     * @param array $options []
     *
     * @return array Returns a list of DM channel objects.
     */
    public function getUserDms(array $options);

    /**
     * @param array $options []
     *
     * @return array Returns a list of connection objects.
     */
    public function getUsersConnections(array $options);

    /**
     * @param array $options []
     *
     * @return array Returns a 204 empty response on success.
     */
    public function leaveGuild(array $options);

    /**
     * @param array $options ['username' => 'string', 'avatar' => 'avatar data']
     *
     * @return array Returns a user object on success.
     */
    public function modifyCurrentUser(array $options);
}
