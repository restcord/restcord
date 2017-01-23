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

use GuzzleHttp\Command\Guzzle\GuzzleClient;

class Guild extends GuzzleClient
{

    /**
     * @param array $options guild.id, nick
     *
     * @return array
     */
    public function updateNick(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, region, icon, verification_level, default_message_notifications, roles, channels
     *
     * @return array
     */
    public function createGuild(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuild(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, region, verification_level, default_message_notifications, afk_channel_id, afk_timeout, icon, owner_id, splash, guild.id
     *
     * @return array
     */
    public function modifyGuild(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function deleteGuild(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildChannels(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, type, bitrate, user_limit, permission_overwrites, guild.id
     *
     * @return array
     */
    public function createGuildChannel(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options id, position, guild.id
     *
     * @return array
     */
    public function modifyGuildChannelPositions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, user.id
     *
     * @return array
     */
    public function getGuildMember(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options limit, after, guild.id
     *
     * @return array
     */
    public function listGuildMembers(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options access_token, nick, roles, mute, deaf, guild.id, user.id
     *
     * @return array
     */
    public function addGuildMember(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options nick, roles, mute, deaf, channel_id, guild.id, user.id
     *
     * @return array
     */
    public function modifyGuildMember(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options nick, guild.id
     *
     * @return array
     */
    public function modifyCurrentUsersNick(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, user.id, role.id
     *
     * @return array
     */
    public function addGuildMemberRole(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, user.id, role.id
     *
     * @return array
     */
    public function removeGuildMemberRole(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, user.id
     *
     * @return array
     */
    public function removeGuildMember(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildBans(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options delete-message-days, guild.id, user.id
     *
     * @return array
     */
    public function createGuildBan(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, user.id
     *
     * @return array
     */
    public function removeGuildBan(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildRoles(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, permissions, color, hoist, mentionable, guild.id
     *
     * @return array
     */
    public function createGuildRole(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options id, position, guild.id
     *
     * @return array
     */
    public function modifyGuildRolePositions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, permissions, color, hoist, mentionable, guild.id, role.id
     *
     * @return array
     */
    public function modifyGuildRole(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, role.id
     *
     * @return array
     */
    public function deleteGuildRole(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options days, guild.id
     *
     * @return array
     */
    public function getGuildPruneCount(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options days, guild.id
     *
     * @return array
     */
    public function beginGuildPrune(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildVoiceRegions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildInvites(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildIntegrations(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options type, id, guild.id
     *
     * @return array
     */
    public function createGuildIntegration(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options expire_behavior, expire_grace_period, enable_emoticons, guild.id, integration.id
     *
     * @return array
     */
    public function modifyGuildIntegration(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, integration.id
     *
     * @return array
     */
    public function deleteGuildIntegration(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id, integration.id
     *
     * @return array
     */
    public function syncGuildIntegration(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function getGuildEmbed(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options guild.id
     *
     * @return array
     */
    public function modifyGuildEmbed(array $options)
    {
        return $options;
    }
    
}
