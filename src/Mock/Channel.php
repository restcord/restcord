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

class Channel extends GuzzleClient
{

    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function getChannel(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options name, position, topic, bitrate, user_limit, channel.id
     *
     * @return array
     */
    public function modifyChannel(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function deletecloseChannel(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options around, before, after, limit, channel.id
     *
     * @return array
     */
    public function getChannelMessages(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id
     *
     * @return array
     */
    public function getChannelMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options content, nonce, tts, file, embed, channel.id
     *
     * @return array
     */
    public function createMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id, emoji
     *
     * @return array
     */
    public function createReaction(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id, emoji
     *
     * @return array
     */
    public function deleteOwnReaction(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id, emoji, user.id
     *
     * @return array
     */
    public function deleteUserReaction(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id, emoji
     *
     * @return array
     */
    public function getReactions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id
     *
     * @return array
     */
    public function deleteAllReactions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options content, channel.id, message.id
     *
     * @return array
     */
    public function editMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id
     *
     * @return array
     */
    public function deleteMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options messages, channel.id
     *
     * @return array
     */
    public function bulkDeleteMessages(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function bulkDeleteMessagesDeprecated(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options allow, deny, type, channel.id, overwrite.id
     *
     * @return array
     */
    public function editChannelPermissions(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function getChannelInvites(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options max_age, max_uses, temporary, unique, channel.id
     *
     * @return array
     */
    public function createChannelInvite(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, overwrite.id
     *
     * @return array
     */
    public function deleteChannelPermission(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function triggerTypingIndicator(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id
     *
     * @return array
     */
    public function getPinnedMessages(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id
     *
     * @return array
     */
    public function addPinnedChannelMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, message.id
     *
     * @return array
     */
    public function deletePinnedChannelMessage(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options access_token, nick, channel.id, user.id
     *
     * @return array
     */
    public function groupDmAddRecipient(array $options)
    {
        return $options;
    }
    
    
    /**
     * @param array $options channel.id, user.id
     *
     * @return array
     */
    public function groupDmRemoveRecipient(array $options)
    {
        return $options;
    }
    
}
