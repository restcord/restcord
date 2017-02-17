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
 * Channel Intellisense Helper.
 */
interface Channel
{
    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function addPinnedChannelMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'messages' => 'array']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function bulkDeleteMessages(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array
     */
    public function bulkDeleteMessagesDeprecated(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'max_age' => 'integer', 'max_uses' => 'integer', 'temporary' => 'bool', 'unique' => 'bool']
     *
     * @return array Returns an invite object.
     */
    public function createChannelInvite(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'content' => 'string', 'nonce' => 'snowflake', 'tts' => 'bool', 'file' => 'file contents', 'embed' => 'object']
     *
     * @return array Returns a message object.
     */
    public function createMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function createReaction(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
     *
     * @return array
     */
    public function deleteAllReactions(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteChannelPermission(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns a guild channel or dm channel object on success.
     */
    public function deletecloseChannel(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteOwnReaction(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deletePinnedChannelMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string', 'user.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function deleteUserReaction(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string', 'allow' => 'integer', 'deny' => 'integer', 'type' => 'string']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function editChannelPermissions(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'content' => 'string']
     *
     * @return array Returns a message object.
     */
    public function editMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns a guild channel or dm channel object.
     */
    public function getChannel(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns a list of invite objects (with invite metadata) for the channel.
     */
    public function getChannelInvites(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
     *
     * @return array Returns a specific message in the channel.
     */
    public function getChannelMessage(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'around' => 'snowflake', 'before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
     *
     * @return array Returns the messages for a channel.
     */
    public function getChannelMessages(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns all pinned messages in the channel as an array of message objects.
     */
    public function getPinnedMessages(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
     *
     * @return array Returns an array of user objects on success.
     */
    public function getReactions(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake', 'access_token' => 'string', 'nick' => 'string']
     *
     * @return array
     */
    public function groupDmAddRecipient(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake']
     *
     * @return array
     */
    public function groupDmRemoveRecipient(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'position' => 'integer', 'topic' => 'string', 'bitrate' => 'integer', 'user_limit' => 'integer']
     *
     * @return array Returns a guild channel on success, and a 400 BAD REQUEST on invalid parameters.
     */
    public function modifyChannel(array $options);

    /**
     * @param array $options ['channel.id' => 'snowflake']
     *
     * @return array Returns a 204 empty response on success.
     */
    public function triggerTypingIndicator(array $options);
}
