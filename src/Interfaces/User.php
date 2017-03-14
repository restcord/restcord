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
 * User Intellisense Helper.
 */
interface User
{
    /**
     * @see https://discordapp.com/developers/docs/resources/user#create-dm
     *
     * @param array $options ['recipient_id' => 'snowflake']
     *
     * @return \RestCord\Model\Channel\DmChannel Returns a DM channel object.
     */
    public function createDm(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#create-group-dm
     *
     * @param array $options ['access_tokens' => 'array', 'nicks' => 'dict']
     *
     * @return \RestCord\Model\Channel\DmChannel Returns a DM channel object.
     */
    public function createGroupDm(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#get-current-user
     *
     * @param array $options []
     *
     * @return \RestCord\Model\User\User Returns the user object of the requester's account.
     */
    public function getCurrentUser(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#get-current-user-guilds
     *
     * @param array $options ['before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
     *
     * @return \RestCord\Model\User\UserGuild Returns a list of user guild objects the current user is a member of.
     */
    public function getCurrentUserGuilds(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#get-user
     *
     * @param array $options ['user.id' => 'snowflake']
     *
     * @return \RestCord\Model\User\User Returns a user for a given user ID.
     */
    public function getUser(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#get-user-dms
     *
     * @param array $options []
     *
     * @return \RestCord\Model\Channel\DmChannel Returns a list of DM channel objects.
     */
    public function getUserDms(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#get-users-connections
     *
     * @param array $options []
     *
     * @return \RestCord\Model\User\Connection Returns a list of connection objects.
     */
    public function getUsersConnections(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#leave-guild
     *
     * @param array $options ['guild.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function leaveGuild(array $options);

    /**
     * @see https://discordapp.com/developers/docs/resources/user#modify-current-user
     *
     * @param array $options ['username' => 'string', 'avatar' => 'avatar data']
     *
     * @return \RestCord\Model\User\User Returns a user object on success.
     */
    public function modifyCurrentUser(array $options);
}
