<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class GuildsApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function actionGuildJoinRequest(array $options = []): mixed
    {
        return $this->actionGuildJoinRequestAsync($options)->wait();
    }

    public function actionGuildJoinRequestAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('action_guild_join_request', $options);
    }

    public function addGuildMember(array $options = []): mixed
    {
        return $this->addGuildMemberAsync($options)->wait();
    }

    public function addGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_guild_member', $options);
    }

    public function addGuildMemberRole(array $options = []): mixed
    {
        return $this->addGuildMemberRoleAsync($options)->wait();
    }

    public function addGuildMemberRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('add_guild_member_role', $options);
    }

    public function banUserFromGuild(array $options = []): mixed
    {
        return $this->banUserFromGuildAsync($options)->wait();
    }

    public function banUserFromGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('ban_user_from_guild', $options);
    }

    public function bulkBanUsersFromGuild(array $options = []): mixed
    {
        return $this->bulkBanUsersFromGuildAsync($options)->wait();
    }

    public function bulkBanUsersFromGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_ban_users_from_guild', $options);
    }

    public function bulkUpdateGuildChannels(array $options = []): mixed
    {
        return $this->bulkUpdateGuildChannelsAsync($options)->wait();
    }

    public function bulkUpdateGuildChannelsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_update_guild_channels', $options);
    }

    public function bulkUpdateGuildRoles(array $options = []): mixed
    {
        return $this->bulkUpdateGuildRolesAsync($options)->wait();
    }

    public function bulkUpdateGuildRolesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('bulk_update_guild_roles', $options);
    }

    public function countGuildScheduledEventUsers(array $options = []): mixed
    {
        return $this->countGuildScheduledEventUsersAsync($options)->wait();
    }

    public function countGuildScheduledEventUsersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('count_guild_scheduled_event_users', $options);
    }

    public function createAutoModerationRule(array $options = []): mixed
    {
        return $this->createAutoModerationRuleAsync($options)->wait();
    }

    public function createAutoModerationRuleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_auto_moderation_rule', $options);
    }

    public function createGuildChannel(array $options = []): mixed
    {
        return $this->createGuildChannelAsync($options)->wait();
    }

    public function createGuildChannelAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_channel', $options);
    }

    public function createGuildEmoji(array $options = []): mixed
    {
        return $this->createGuildEmojiAsync($options)->wait();
    }

    public function createGuildEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_emoji', $options);
    }

    public function createGuildRole(array $options = []): mixed
    {
        return $this->createGuildRoleAsync($options)->wait();
    }

    public function createGuildRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_role', $options);
    }

    public function createGuildScheduledEvent(array $options = []): mixed
    {
        return $this->createGuildScheduledEventAsync($options)->wait();
    }

    public function createGuildScheduledEventAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_scheduled_event', $options);
    }

    public function createGuildScheduledEventException(array $options = []): mixed
    {
        return $this->createGuildScheduledEventExceptionAsync($options)->wait();
    }

    public function createGuildScheduledEventExceptionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_scheduled_event_exception', $options);
    }

    public function createGuildSoundboardSound(array $options = []): mixed
    {
        return $this->createGuildSoundboardSoundAsync($options)->wait();
    }

    public function createGuildSoundboardSoundAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_soundboard_sound', $options);
    }

    public function createGuildSticker(array $options = []): mixed
    {
        return $this->createGuildStickerAsync($options)->wait();
    }

    public function createGuildStickerAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_sticker', $options);
    }

    public function createGuildTemplate(array $options = []): mixed
    {
        return $this->createGuildTemplateAsync($options)->wait();
    }

    public function createGuildTemplateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('create_guild_template', $options);
    }

    public function deleteAutoModerationRule(array $options = []): mixed
    {
        return $this->deleteAutoModerationRuleAsync($options)->wait();
    }

    public function deleteAutoModerationRuleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_auto_moderation_rule', $options);
    }

    public function deleteGuildEmoji(array $options = []): mixed
    {
        return $this->deleteGuildEmojiAsync($options)->wait();
    }

    public function deleteGuildEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_emoji', $options);
    }

    public function deleteGuildIntegration(array $options = []): mixed
    {
        return $this->deleteGuildIntegrationAsync($options)->wait();
    }

    public function deleteGuildIntegrationAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_integration', $options);
    }

    public function deleteGuildMember(array $options = []): mixed
    {
        return $this->deleteGuildMemberAsync($options)->wait();
    }

    public function deleteGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_member', $options);
    }

    public function deleteGuildMemberRole(array $options = []): mixed
    {
        return $this->deleteGuildMemberRoleAsync($options)->wait();
    }

    public function deleteGuildMemberRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_member_role', $options);
    }

    public function deleteGuildRole(array $options = []): mixed
    {
        return $this->deleteGuildRoleAsync($options)->wait();
    }

    public function deleteGuildRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_role', $options);
    }

    public function deleteGuildScheduledEvent(array $options = []): mixed
    {
        return $this->deleteGuildScheduledEventAsync($options)->wait();
    }

    public function deleteGuildScheduledEventAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_scheduled_event', $options);
    }

    public function deleteGuildScheduledEventException(array $options = []): mixed
    {
        return $this->deleteGuildScheduledEventExceptionAsync($options)->wait();
    }

    public function deleteGuildScheduledEventExceptionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_scheduled_event_exception', $options);
    }

    public function deleteGuildSoundboardSound(array $options = []): mixed
    {
        return $this->deleteGuildSoundboardSoundAsync($options)->wait();
    }

    public function deleteGuildSoundboardSoundAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_soundboard_sound', $options);
    }

    public function deleteGuildSticker(array $options = []): mixed
    {
        return $this->deleteGuildStickerAsync($options)->wait();
    }

    public function deleteGuildStickerAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_sticker', $options);
    }

    public function deleteGuildTemplate(array $options = []): mixed
    {
        return $this->deleteGuildTemplateAsync($options)->wait();
    }

    public function deleteGuildTemplateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_guild_template', $options);
    }

    public function getActiveGuildThreads(array $options = []): mixed
    {
        return $this->getActiveGuildThreadsAsync($options)->wait();
    }

    public function getActiveGuildThreadsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_active_guild_threads', $options);
    }

    public function getAutoModerationRule(array $options = []): mixed
    {
        return $this->getAutoModerationRuleAsync($options)->wait();
    }

    public function getAutoModerationRuleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_auto_moderation_rule', $options);
    }

    public function getGuild(array $options = []): mixed
    {
        return $this->getGuildAsync($options)->wait();
    }

    public function getGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild', $options);
    }

    public function getGuildBan(array $options = []): mixed
    {
        return $this->getGuildBanAsync($options)->wait();
    }

    public function getGuildBanAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_ban', $options);
    }

    public function getGuildEmoji(array $options = []): mixed
    {
        return $this->getGuildEmojiAsync($options)->wait();
    }

    public function getGuildEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_emoji', $options);
    }

    public function getGuildJoinRequests(array $options = []): mixed
    {
        return $this->getGuildJoinRequestsAsync($options)->wait();
    }

    public function getGuildJoinRequestsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_join_requests', $options);
    }

    public function getGuildMember(array $options = []): mixed
    {
        return $this->getGuildMemberAsync($options)->wait();
    }

    public function getGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_member', $options);
    }

    public function getGuildNewMemberWelcome(array $options = []): mixed
    {
        return $this->getGuildNewMemberWelcomeAsync($options)->wait();
    }

    public function getGuildNewMemberWelcomeAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_new_member_welcome', $options);
    }

    public function getGuildPreview(array $options = []): mixed
    {
        return $this->getGuildPreviewAsync($options)->wait();
    }

    public function getGuildPreviewAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_preview', $options);
    }

    public function getGuildRole(array $options = []): mixed
    {
        return $this->getGuildRoleAsync($options)->wait();
    }

    public function getGuildRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_role', $options);
    }

    public function getGuildScheduledEvent(array $options = []): mixed
    {
        return $this->getGuildScheduledEventAsync($options)->wait();
    }

    public function getGuildScheduledEventAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_scheduled_event', $options);
    }

    public function getGuildSoundboardSound(array $options = []): mixed
    {
        return $this->getGuildSoundboardSoundAsync($options)->wait();
    }

    public function getGuildSoundboardSoundAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_soundboard_sound', $options);
    }

    public function getGuildSticker(array $options = []): mixed
    {
        return $this->getGuildStickerAsync($options)->wait();
    }

    public function getGuildStickerAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_sticker', $options);
    }

    public function getGuildTemplate(array $options = []): mixed
    {
        return $this->getGuildTemplateAsync($options)->wait();
    }

    public function getGuildTemplateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_template', $options);
    }

    public function getGuildVanityUrl(array $options = []): mixed
    {
        return $this->getGuildVanityUrlAsync($options)->wait();
    }

    public function getGuildVanityUrlAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_vanity_url', $options);
    }

    public function getGuildWebhooks(array $options = []): mixed
    {
        return $this->getGuildWebhooksAsync($options)->wait();
    }

    public function getGuildWebhooksAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_webhooks', $options);
    }

    public function getGuildWelcomeScreen(array $options = []): mixed
    {
        return $this->getGuildWelcomeScreenAsync($options)->wait();
    }

    public function getGuildWelcomeScreenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_welcome_screen', $options);
    }

    public function getGuildWidget(array $options = []): mixed
    {
        return $this->getGuildWidgetAsync($options)->wait();
    }

    public function getGuildWidgetAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_widget', $options);
    }

    public function getGuildWidgetPng(array $options = []): mixed
    {
        return $this->getGuildWidgetPngAsync($options)->wait();
    }

    public function getGuildWidgetPngAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_widget_png', $options);
    }

    public function getGuildWidgetSettings(array $options = []): mixed
    {
        return $this->getGuildWidgetSettingsAsync($options)->wait();
    }

    public function getGuildWidgetSettingsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guild_widget_settings', $options);
    }

    public function getGuildsOnboarding(array $options = []): mixed
    {
        return $this->getGuildsOnboardingAsync($options)->wait();
    }

    public function getGuildsOnboardingAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_guilds_onboarding', $options);
    }

    public function getSelfVoiceState(array $options = []): mixed
    {
        return $this->getSelfVoiceStateAsync($options)->wait();
    }

    public function getSelfVoiceStateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_self_voice_state', $options);
    }

    public function getVoiceState(array $options = []): mixed
    {
        return $this->getVoiceStateAsync($options)->wait();
    }

    public function getVoiceStateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_voice_state', $options);
    }

    public function guildRoleMemberCounts(array $options = []): mixed
    {
        return $this->guildRoleMemberCountsAsync($options)->wait();
    }

    public function guildRoleMemberCountsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('guild_role_member_counts', $options);
    }

    public function guildSearch(array $options = []): mixed
    {
        return $this->guildSearchAsync($options)->wait();
    }

    public function guildSearchAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('guild_search', $options);
    }

    public function listAutoModerationRules(array $options = []): mixed
    {
        return $this->listAutoModerationRulesAsync($options)->wait();
    }

    public function listAutoModerationRulesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_auto_moderation_rules', $options);
    }

    public function listGuildAuditLogEntries(array $options = []): mixed
    {
        return $this->listGuildAuditLogEntriesAsync($options)->wait();
    }

    public function listGuildAuditLogEntriesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_audit_log_entries', $options);
    }

    public function listGuildBans(array $options = []): mixed
    {
        return $this->listGuildBansAsync($options)->wait();
    }

    public function listGuildBansAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_bans', $options);
    }

    public function listGuildChannels(array $options = []): mixed
    {
        return $this->listGuildChannelsAsync($options)->wait();
    }

    public function listGuildChannelsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_channels', $options);
    }

    public function listGuildEmojis(array $options = []): mixed
    {
        return $this->listGuildEmojisAsync($options)->wait();
    }

    public function listGuildEmojisAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_emojis', $options);
    }

    public function listGuildIntegrations(array $options = []): mixed
    {
        return $this->listGuildIntegrationsAsync($options)->wait();
    }

    public function listGuildIntegrationsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_integrations', $options);
    }

    public function listGuildInvites(array $options = []): mixed
    {
        return $this->listGuildInvitesAsync($options)->wait();
    }

    public function listGuildInvitesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_invites', $options);
    }

    public function listGuildMembers(array $options = []): mixed
    {
        return $this->listGuildMembersAsync($options)->wait();
    }

    public function listGuildMembersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_members', $options);
    }

    public function listGuildRoles(array $options = []): mixed
    {
        return $this->listGuildRolesAsync($options)->wait();
    }

    public function listGuildRolesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_roles', $options);
    }

    public function listGuildScheduledEventExceptionUsers(array $options = []): mixed
    {
        return $this->listGuildScheduledEventExceptionUsersAsync($options)->wait();
    }

    public function listGuildScheduledEventExceptionUsersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_scheduled_event_exception_users', $options);
    }

    public function listGuildScheduledEventUsers(array $options = []): mixed
    {
        return $this->listGuildScheduledEventUsersAsync($options)->wait();
    }

    public function listGuildScheduledEventUsersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_scheduled_event_users', $options);
    }

    public function listGuildScheduledEvents(array $options = []): mixed
    {
        return $this->listGuildScheduledEventsAsync($options)->wait();
    }

    public function listGuildScheduledEventsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_scheduled_events', $options);
    }

    public function listGuildSoundboardSounds(array $options = []): mixed
    {
        return $this->listGuildSoundboardSoundsAsync($options)->wait();
    }

    public function listGuildSoundboardSoundsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_soundboard_sounds', $options);
    }

    public function listGuildStickers(array $options = []): mixed
    {
        return $this->listGuildStickersAsync($options)->wait();
    }

    public function listGuildStickersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_stickers', $options);
    }

    public function listGuildTemplates(array $options = []): mixed
    {
        return $this->listGuildTemplatesAsync($options)->wait();
    }

    public function listGuildTemplatesAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_templates', $options);
    }

    public function listGuildVoiceRegions(array $options = []): mixed
    {
        return $this->listGuildVoiceRegionsAsync($options)->wait();
    }

    public function listGuildVoiceRegionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('list_guild_voice_regions', $options);
    }

    public function previewPruneGuild(array $options = []): mixed
    {
        return $this->previewPruneGuildAsync($options)->wait();
    }

    public function previewPruneGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('preview_prune_guild', $options);
    }

    public function pruneGuild(array $options = []): mixed
    {
        return $this->pruneGuildAsync($options)->wait();
    }

    public function pruneGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('prune_guild', $options);
    }

    public function putGuildsOnboarding(array $options = []): mixed
    {
        return $this->putGuildsOnboardingAsync($options)->wait();
    }

    public function putGuildsOnboardingAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('put_guilds_onboarding', $options);
    }

    public function searchGuildMembers(array $options = []): mixed
    {
        return $this->searchGuildMembersAsync($options)->wait();
    }

    public function searchGuildMembersAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('search_guild_members', $options);
    }

    public function syncGuildTemplate(array $options = []): mixed
    {
        return $this->syncGuildTemplateAsync($options)->wait();
    }

    public function syncGuildTemplateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('sync_guild_template', $options);
    }

    public function unbanUserFromGuild(array $options = []): mixed
    {
        return $this->unbanUserFromGuildAsync($options)->wait();
    }

    public function unbanUserFromGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('unban_user_from_guild', $options);
    }

    public function updateAutoModerationRule(array $options = []): mixed
    {
        return $this->updateAutoModerationRuleAsync($options)->wait();
    }

    public function updateAutoModerationRuleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_auto_moderation_rule', $options);
    }

    public function updateGuild(array $options = []): mixed
    {
        return $this->updateGuildAsync($options)->wait();
    }

    public function updateGuildAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild', $options);
    }

    public function updateGuildEmoji(array $options = []): mixed
    {
        return $this->updateGuildEmojiAsync($options)->wait();
    }

    public function updateGuildEmojiAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_emoji', $options);
    }

    public function updateGuildIncidentActions(array $options = []): mixed
    {
        return $this->updateGuildIncidentActionsAsync($options)->wait();
    }

    public function updateGuildIncidentActionsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_incident_actions', $options);
    }

    public function updateGuildMember(array $options = []): mixed
    {
        return $this->updateGuildMemberAsync($options)->wait();
    }

    public function updateGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_member', $options);
    }

    public function updateGuildRole(array $options = []): mixed
    {
        return $this->updateGuildRoleAsync($options)->wait();
    }

    public function updateGuildRoleAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_role', $options);
    }

    public function updateGuildScheduledEvent(array $options = []): mixed
    {
        return $this->updateGuildScheduledEventAsync($options)->wait();
    }

    public function updateGuildScheduledEventAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_scheduled_event', $options);
    }

    public function updateGuildScheduledEventException(array $options = []): mixed
    {
        return $this->updateGuildScheduledEventExceptionAsync($options)->wait();
    }

    public function updateGuildScheduledEventExceptionAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_scheduled_event_exception', $options);
    }

    public function updateGuildSoundboardSound(array $options = []): mixed
    {
        return $this->updateGuildSoundboardSoundAsync($options)->wait();
    }

    public function updateGuildSoundboardSoundAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_soundboard_sound', $options);
    }

    public function updateGuildSticker(array $options = []): mixed
    {
        return $this->updateGuildStickerAsync($options)->wait();
    }

    public function updateGuildStickerAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_sticker', $options);
    }

    public function updateGuildTemplate(array $options = []): mixed
    {
        return $this->updateGuildTemplateAsync($options)->wait();
    }

    public function updateGuildTemplateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_template', $options);
    }

    public function updateGuildWelcomeScreen(array $options = []): mixed
    {
        return $this->updateGuildWelcomeScreenAsync($options)->wait();
    }

    public function updateGuildWelcomeScreenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_welcome_screen', $options);
    }

    public function updateGuildWidgetSettings(array $options = []): mixed
    {
        return $this->updateGuildWidgetSettingsAsync($options)->wait();
    }

    public function updateGuildWidgetSettingsAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_guild_widget_settings', $options);
    }

    public function updateMyGuildMember(array $options = []): mixed
    {
        return $this->updateMyGuildMemberAsync($options)->wait();
    }

    public function updateMyGuildMemberAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_my_guild_member', $options);
    }

    public function updateSelfVoiceState(array $options = []): mixed
    {
        return $this->updateSelfVoiceStateAsync($options)->wait();
    }

    public function updateSelfVoiceStateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_self_voice_state', $options);
    }

    public function updateVoiceState(array $options = []): mixed
    {
        return $this->updateVoiceStateAsync($options)->wait();
    }

    public function updateVoiceStateAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_voice_state', $options);
    }
}
