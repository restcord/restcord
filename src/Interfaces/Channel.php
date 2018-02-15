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
 * Channel Intellisense Helper
 */
interface Channel {

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#add-pinned-channel-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function addPinnedChannelMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#bulk-delete-messages-deprecated
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function bulkDeleteMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-channel-invite
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'max_age' => 'integer', 'max_uses' => 'integer', 'temporary' => 'bool', 'unique' => 'bool']
	 * @return \RestCord\Model\Invite\Invite Returns an invite object.
	 */
	public function createChannelInvite(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'content' => 'string', 'nonce' => 'snowflake', 'tts' => 'bool', 'file' => 'file contents', 'embed' => 'object', 'payload_json' => 'string']
	 * @return array
	 */
	public function createMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function createReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-all-reactions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function deleteAllReactions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-channel-permission
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteChannelPermission(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete/close-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return \RestCord\Model\Channel\Channel Returns a channel object on success.
	 */
	public function deleteOrcloseChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-own-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteOwnReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-pinned-channel-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deletePinnedChannelMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-user-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string', 'user.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function deleteUserReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#edit-channel-permissions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string', 'allow' => 'integer', 'deny' => 'integer', 'type' => 'string']
	 * @return array Returns a 204 empty response on success.
	 */
	public function editChannelPermissions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#edit-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'content' => 'string', 'embed' => 'object']
	 * @return \RestCord\Model\Channel\Message Returns a message object.
	 */
	public function editMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return \RestCord\Model\Channel\Channel Returns a channel object.
	 */
	public function getChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-invites
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return \RestCord\Model\Invite\Invite[] Returns a list of invite objects (with invite metadata) for the channel.
	 */
	public function getChannelInvites(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array Returns a specific message in the channel.
	 */
	public function getChannelMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-messages
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'around' => 'snowflake', 'before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
	 * @return array Returns the messages for a channel.
	 */
	public function getChannelMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-pinned-messages
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return \RestCord\Model\Channel\Message Returns all pinned messages in the channel as an array of message objects.
	 */
	public function getPinnedMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-reactions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string', 'before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
	 * @return \RestCord\Model\User\User[] Returns an array of user objects on success.
	 */
	public function getReactions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#group-dm-add-recipient
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake', 'access_token' => 'string', 'nick' => 'string']
	 * @return array
	 */
	public function groupDmAddRecipient(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#group-dm-remove-recipient
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function groupDmRemoveRecipient(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#modify-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'position' => 'integer', 'topic' => 'string', 'nsfw' => 'bool', 'bitrate' => 'integer', 'user_limit' => 'integer', 'permission_overwrites' => 'array', 'parent_id' => 'snowflake']
	 * @return \RestCord\Model\Channel\Channel Returns a channel on success, and a 400 BAD REQUEST on invalid parameters.
	 */
	public function modifyChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#trigger-typing-indicator
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array Returns a 204 empty response on success.
	 */
	public function triggerTypingIndicator(array $options);
}