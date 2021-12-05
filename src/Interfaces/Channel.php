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
	 * @see https://discordapp.com/developers/docs/resources/channel#add-thread-member
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function addThreadMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#bulk-delete-messages
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'messages' => 'array']
	 * @return array
	 */
	public function bulkDeleteMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-channel-invite
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'max_age' => 'integer', 'max_uses' => 'integer', 'temporary' => 'boolean', 'unique' => 'boolean', 'target_type' => 'integer', 'target_user_id' => 'snowflake', 'target_application_id' => 'snowflake']
	 * @return array
	 */
	public function createChannelInvite(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'content' => 'string', 'tts' => 'boolean', 'embeds' => 'array', 'embed (deprecated)' => 'object', 'allowed_mentions' => 'object', 'message_reference' => 'message reference', 'components' => 'array', 'sticker_ids' => 'array', 'files' => 'file contents', 'payload_json' => 'string', 'attachments' => 'array']
	 * @return array
	 */
	public function createMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#create-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
	 * @return array
	 */
	public function createReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#crosspost-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function crosspostMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-all-reactions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function deleteAllReactions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-all-reactions-for-emoji
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
	 * @return array
	 */
	public function deleteAllReactionsForEmoji(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-channel-permission
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string']
	 * @return array
	 */
	public function deleteChannelPermission(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function deleteMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete/close-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function deleteOrcloseChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-own-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string']
	 * @return array
	 */
	public function deleteOwnReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#delete-user-reaction
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function deleteUserReaction(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#edit-channel-permissions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'overwrite.id' => 'string', 'allow' => 'string', 'deny' => 'string', 'type' => 'integer']
	 * @return array
	 */
	public function editChannelPermissions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#edit-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'content' => 'string', 'embeds' => 'array', 'embed (deprecated)' => 'object', 'flags' => 'integer', 'allowed_mentions' => 'object', 'components' => 'array', 'files' => 'file contents', 'payload_json' => 'string', 'attachments' => 'array']
	 * @return array
	 */
	public function editMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#follow-news-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'webhook_channel_id' => 'snowflake']
	 * @return array
	 */
	public function followNewsChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function getChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-invites
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function getChannelInvites(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function getChannelMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-channel-messages
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'around' => 'snowflake', 'before' => 'snowflake', 'after' => 'snowflake', 'limit' => 'integer']
	 * @return array
	 */
	public function getChannelMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-pinned-messages
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function getPinnedMessages(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-reactions
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'emoji' => 'string', 'after' => 'snowflake', 'limit' => 'integer']
	 * @return array
	 */
	public function getReactions(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#get-thread-member
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function getThreadMember(array $options);

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
	 * @see https://discordapp.com/developers/docs/resources/channel#join-thread
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function joinThread(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#leave-thread
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function leaveThread(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#list-active-threads
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function listActiveThreads(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#list-joined-private-archived-threads
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'before' => 'snowflake', 'limit' => 'integer']
	 * @return array
	 */
	public function listJoinedPrivateArchivedThreads(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#list-private-archived-threads
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'before' => 'ISO8601 timestamp', 'limit' => 'integer']
	 * @return array
	 */
	public function listPrivateArchivedThreads(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#list-public-archived-threads
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'before' => 'ISO8601 timestamp', 'limit' => 'integer']
	 * @return array
	 */
	public function listPublicArchivedThreads(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#list-thread-members
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function listThreadMembers(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#modify-channel
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function modifyChannel(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#pin-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function pinMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#remove-thread-member
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'user.id' => 'snowflake']
	 * @return array
	 */
	public function removeThreadMember(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#start-thread-with-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake', 'name' => 'string', 'auto_archive_duration' => 'integer', 'rate_limit_per_user' => 'integer']
	 * @return array
	 */
	public function startThreadWithMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#start-thread-without-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'name' => 'string', 'auto_archive_duration' => 'integer', 'type' => 'integer', 'invitable' => 'boolean', 'rate_limit_per_user' => 'integer']
	 * @return array
	 */
	public function startThreadWithoutMessage(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#trigger-typing-indicator
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function triggerTypingIndicator(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/channel#unpin-message
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'message.id' => 'snowflake']
	 * @return array
	 */
	public function unpinMessage(array $options);
}