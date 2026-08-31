<?php

declare(strict_types=1);

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

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class ChannelsApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function addGroupDmUser(array $options = []): mixed
    {
        return $this->addGroupDmUserAsync($options)->wait();
    }

    public function addGroupDmUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_group_dm_user', $options);
    }

    public function addMyMessageReaction(array $options = []): mixed
    {
        return $this->addMyMessageReactionAsync($options)->wait();
    }

    public function addMyMessageReactionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_my_message_reaction', $options);
    }

    public function addThreadMember(array $options = []): mixed
    {
        return $this->addThreadMemberAsync($options)->wait();
    }

    public function addThreadMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_thread_member', $options);
    }

    public function bulkDeleteMessages(array $options = []): mixed
    {
        return $this->bulkDeleteMessagesAsync($options)->wait();
    }

    public function bulkDeleteMessagesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_delete_messages', $options);
    }

    public function createChannelInvite(array $options = []): mixed
    {
        return $this->createChannelInviteAsync($options)->wait();
    }

    public function createChannelInviteAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_channel_invite', $options);
    }

    public function createMessage(array $options = []): mixed
    {
        return $this->createMessageAsync($options)->wait();
    }

    public function createMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_message', $options);
    }

    public function createPin(array $options = []): mixed
    {
        return $this->createPinAsync($options)->wait();
    }

    public function createPinAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_pin', $options);
    }

    public function createThread(array $options = []): mixed
    {
        return $this->createThreadAsync($options)->wait();
    }

    public function createThreadAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_thread', $options);
    }

    public function createThreadFromMessage(array $options = []): mixed
    {
        return $this->createThreadFromMessageAsync($options)->wait();
    }

    public function createThreadFromMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_thread_from_message', $options);
    }

    public function createWebhook(array $options = []): mixed
    {
        return $this->createWebhookAsync($options)->wait();
    }

    public function createWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_webhook', $options);
    }

    public function crosspostMessage(array $options = []): mixed
    {
        return $this->crosspostMessageAsync($options)->wait();
    }

    public function crosspostMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('crosspost_message', $options);
    }

    public function deleteAllMessageReactions(array $options = []): mixed
    {
        return $this->deleteAllMessageReactionsAsync($options)->wait();
    }

    public function deleteAllMessageReactionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_all_message_reactions', $options);
    }

    public function deleteAllMessageReactionsByEmoji(array $options = []): mixed
    {
        return $this->deleteAllMessageReactionsByEmojiAsync($options)->wait();
    }

    public function deleteAllMessageReactionsByEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_all_message_reactions_by_emoji', $options);
    }

    public function deleteChannel(array $options = []): mixed
    {
        return $this->deleteChannelAsync($options)->wait();
    }

    public function deleteChannelAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_channel', $options);
    }

    public function deleteChannelPermissionOverwrite(array $options = []): mixed
    {
        return $this->deleteChannelPermissionOverwriteAsync($options)->wait();
    }

    public function deleteChannelPermissionOverwriteAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_channel_permission_overwrite', $options);
    }

    public function deleteGroupDmUser(array $options = []): mixed
    {
        return $this->deleteGroupDmUserAsync($options)->wait();
    }

    public function deleteGroupDmUserAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_group_dm_user', $options);
    }

    public function deleteMessage(array $options = []): mixed
    {
        return $this->deleteMessageAsync($options)->wait();
    }

    public function deleteMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_message', $options);
    }

    public function deleteMyMessageReaction(array $options = []): mixed
    {
        return $this->deleteMyMessageReactionAsync($options)->wait();
    }

    public function deleteMyMessageReactionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_my_message_reaction', $options);
    }

    public function deletePin(array $options = []): mixed
    {
        return $this->deletePinAsync($options)->wait();
    }

    public function deletePinAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_pin', $options);
    }

    public function deleteThreadMember(array $options = []): mixed
    {
        return $this->deleteThreadMemberAsync($options)->wait();
    }

    public function deleteThreadMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_thread_member', $options);
    }

    public function deleteUserMessageReaction(array $options = []): mixed
    {
        return $this->deleteUserMessageReactionAsync($options)->wait();
    }

    public function deleteUserMessageReactionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_user_message_reaction', $options);
    }

    public function deprecatedCreatePin(array $options = []): mixed
    {
        return $this->deprecatedCreatePinAsync($options)->wait();
    }

    public function deprecatedCreatePinAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('deprecated_create_pin', $options);
    }

    public function deprecatedDeletePin(array $options = []): mixed
    {
        return $this->deprecatedDeletePinAsync($options)->wait();
    }

    public function deprecatedDeletePinAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('deprecated_delete_pin', $options);
    }

    public function deprecatedListPins(array $options = []): mixed
    {
        return $this->deprecatedListPinsAsync($options)->wait();
    }

    public function deprecatedListPinsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('deprecated_list_pins', $options);
    }

    public function followChannel(array $options = []): mixed
    {
        return $this->followChannelAsync($options)->wait();
    }

    public function followChannelAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('follow_channel', $options);
    }

    public function getAnswerVoters(array $options = []): mixed
    {
        return $this->getAnswerVotersAsync($options)->wait();
    }

    public function getAnswerVotersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_answer_voters', $options);
    }

    public function getChannel(array $options = []): mixed
    {
        return $this->getChannelAsync($options)->wait();
    }

    public function getChannelAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_channel', $options);
    }

    public function getMessage(array $options = []): mixed
    {
        return $this->getMessageAsync($options)->wait();
    }

    public function getMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_message', $options);
    }

    public function getThreadMember(array $options = []): mixed
    {
        return $this->getThreadMemberAsync($options)->wait();
    }

    public function getThreadMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_thread_member', $options);
    }

    public function joinThread(array $options = []): mixed
    {
        return $this->joinThreadAsync($options)->wait();
    }

    public function joinThreadAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('join_thread', $options);
    }

    public function leaveThread(array $options = []): mixed
    {
        return $this->leaveThreadAsync($options)->wait();
    }

    public function leaveThreadAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('leave_thread', $options);
    }

    public function listChannelInvites(array $options = []): mixed
    {
        return $this->listChannelInvitesAsync($options)->wait();
    }

    public function listChannelInvitesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_channel_invites', $options);
    }

    public function listChannelWebhooks(array $options = []): mixed
    {
        return $this->listChannelWebhooksAsync($options)->wait();
    }

    public function listChannelWebhooksAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_channel_webhooks', $options);
    }

    public function listMessageReactionsByEmoji(array $options = []): mixed
    {
        return $this->listMessageReactionsByEmojiAsync($options)->wait();
    }

    public function listMessageReactionsByEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_message_reactions_by_emoji', $options);
    }

    public function listMessages(array $options = []): mixed
    {
        return $this->listMessagesAsync($options)->wait();
    }

    public function listMessagesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_messages', $options);
    }

    public function listMyPrivateArchivedThreads(array $options = []): mixed
    {
        return $this->listMyPrivateArchivedThreadsAsync($options)->wait();
    }

    public function listMyPrivateArchivedThreadsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_my_private_archived_threads', $options);
    }

    public function listPins(array $options = []): mixed
    {
        return $this->listPinsAsync($options)->wait();
    }

    public function listPinsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_pins', $options);
    }

    public function listPrivateArchivedThreads(array $options = []): mixed
    {
        return $this->listPrivateArchivedThreadsAsync($options)->wait();
    }

    public function listPrivateArchivedThreadsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_private_archived_threads', $options);
    }

    public function listPublicArchivedThreads(array $options = []): mixed
    {
        return $this->listPublicArchivedThreadsAsync($options)->wait();
    }

    public function listPublicArchivedThreadsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_public_archived_threads', $options);
    }

    public function listThreadMembers(array $options = []): mixed
    {
        return $this->listThreadMembersAsync($options)->wait();
    }

    public function listThreadMembersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_thread_members', $options);
    }

    public function pollExpire(array $options = []): mixed
    {
        return $this->pollExpireAsync($options)->wait();
    }

    public function pollExpireAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('poll_expire', $options);
    }

    public function sendSoundboardSound(array $options = []): mixed
    {
        return $this->sendSoundboardSoundAsync($options)->wait();
    }

    public function sendSoundboardSoundAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('send_soundboard_sound', $options);
    }

    public function setChannelPermissionOverwrite(array $options = []): mixed
    {
        return $this->setChannelPermissionOverwriteAsync($options)->wait();
    }

    public function setChannelPermissionOverwriteAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('set_channel_permission_overwrite', $options);
    }

    public function threadSearch(array $options = []): mixed
    {
        return $this->threadSearchAsync($options)->wait();
    }

    public function threadSearchAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('thread_search', $options);
    }

    public function triggerTypingIndicator(array $options = []): mixed
    {
        return $this->triggerTypingIndicatorAsync($options)->wait();
    }

    public function triggerTypingIndicatorAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('trigger_typing_indicator', $options);
    }

    public function updateChannel(array $options = []): mixed
    {
        return $this->updateChannelAsync($options)->wait();
    }

    public function updateChannelAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_channel', $options);
    }

    public function updateMessage(array $options = []): mixed
    {
        return $this->updateMessageAsync($options)->wait();
    }

    public function updateMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_message', $options);
    }

    public function updateVoiceChannelStatus(array $options = []): mixed
    {
        return $this->updateVoiceChannelStatusAsync($options)->wait();
    }

    public function updateVoiceChannelStatusAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_voice_channel_status', $options);
    }
}
