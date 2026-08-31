# Migrate to 0.9

RestCord 0.9 is a breaking API change. JSON and form fields now go under `body`. IDs use underscore names. Sync methods return decoded JSON, a stream, or `null` instead of a DTO or `Result`. Each listed method also has an `Async` pair.

The table maps every legacy v6 call. A removal links to the current official Discord documentation or changelog used for review.

Body cells describe the RestCord call shape. Discord v10 can remove or rename legacy body fields. Check the [current endpoint documentation](https://docs.discord.com/developers/reference) before sending a payload.

For multipart calls, pass the old `file` as `body['files[0]']`. RestCord builds `payload_json`; do not pass it. Where applicable, wrap a singular `embed` in `body['embeds'][0]`.

```php
'body' => ['files[0]' => ['contents' => $contents, 'filename' => 'file.png', 'content_type' => 'image/png']]
```

| old call | new call | old option keys | new option keys | body nesting | return change | removal source |
| --- | --- | --- | --- | --- | --- | --- |
| `guild.createGuild` | removed | `name`, `region`, `icon`, `verification_level`, `default_message_notifications`, `explicit_content_filter`, `roles`, `channels` | - | `name`, `region`, `icon`, `verification_level`, `default_message_notifications`, `explicit_content_filter`, `roles`, `channels` removed | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/change-log#guild-create-deprecation) |
| `guild.getGuild` | `guilds.getGuild` | `guild.id`, `with_counts` | `guild_id`, `with_counts` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.modifyGuild` | `guilds.updateGuild` | `guild.id`, `name`, `region`, `verification_level`, `default_message_notifications`, `explicit_content_filter`, `afk_channel_id`, `afk_timeout`, `icon`, `owner_id`, `splash`, `system_channel_id` | `guild_id`, `audit_log_reason`, `body` | `name`, `region`, `verification_level`, `default_message_notifications`, `explicit_content_filter`, `afk_channel_id`, `afk_timeout`, `icon`, `owner_id`, `splash`, `system_channel_id` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.deleteGuild` | removed | `guild.id` | - | - | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/change-log#guild-create-deprecation) |
| `guild.getGuildChannels` | `guilds.listGuildChannels` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.createGuildChannel` | `guilds.createGuildChannel` | `guild.id`, `name`, `type`, `topic`, `bitrate`, `user_limit`, `rate_limit_per_user`, `position`, `permission_overwrites`, `parent_id`, `nsfw` | `guild_id`, `audit_log_reason`, `body` | `name`, `type`, `topic`, `bitrate`, `user_limit`, `rate_limit_per_user`, `position`, `permission_overwrites`, `parent_id`, `nsfw` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.modifyGuildChannelPositions` | `guilds.bulkUpdateGuildChannels` | `guild.id`, `id`, `position` | `guild_id`, `body` | `id`, `position` to `body` | `DTO/Result` to `null` | - |
| `guild.getGuildMember` | `guilds.getGuildMember` | `guild.id`, `user.id` | `guild_id`, `user_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.listGuildMembers` | `guilds.listGuildMembers` | `guild.id`, `limit`, `after` | `guild_id`, `limit`, `after` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.addGuildMember` | `guilds.addGuildMember` | `guild.id`, `user.id`, `access_token`, `nick`, `roles`, `mute`, `deaf` | `guild_id`, `user_id`, `body` | `access_token`, `nick`, `roles`, `mute`, `deaf` to `body` | `DTO/Result` to `decoded JSON`, `null` | - |
| `guild.modifyGuildMember` | `guilds.updateGuildMember` | `guild.id`, `user.id`, `nick`, `roles`, `mute`, `deaf`, `channel_id` | `guild_id`, `user_id`, `audit_log_reason`, `body` | `nick`, `roles`, `mute`, `deaf`, `channel_id` to `body` | `DTO/Result` to `decoded JSON`, `null` | - |
| `guild.modifyCurrentUserNick` | `guilds.updateMyGuildMember` | `guild.id`, `nick` | `guild_id`, `audit_log_reason`, `body` | `nick` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.addGuildMemberRole` | `guilds.addGuildMemberRole` | `guild.id`, `user.id`, `role.id` | `guild_id`, `user_id`, `role_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `guild.removeGuildMemberRole` | `guilds.deleteGuildMemberRole` | `guild.id`, `user.id`, `role.id` | `guild_id`, `user_id`, `role_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `guild.removeGuildMember` | `guilds.deleteGuildMember` | `guild.id`, `user.id` | `guild_id`, `user_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `guild.getGuildBans` | `guilds.listGuildBans` | `guild.id` | `guild_id`, `limit`, `before`, `after` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildBan` | `guilds.getGuildBan` | `guild.id`, `user.id` | `guild_id`, `user_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.createGuildBan` | `guilds.banUserFromGuild` | `guild.id`, `user.id`, `delete-message-days?`, `reason?` | `guild_id`, `user_id`, `audit_log_reason`, `body` | `delete-message-days?` to `body.delete_message_days`; `reason?` to `audit_log_reason` | `DTO/Result` to `null` | - |
| `guild.removeGuildBan` | `guilds.unbanUserFromGuild` | `guild.id`, `user.id` | `guild_id`, `user_id`, `audit_log_reason`, `body` | `body` added | `DTO/Result` to `null` | - |
| `guild.getGuildRoles` | `guilds.listGuildRoles` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.createGuildRole` | `guilds.createGuildRole` | `guild.id`, `name`, `permissions`, `color`, `hoist`, `mentionable` | `guild_id`, `audit_log_reason`, `body` | `name`, `permissions`, `color`, `hoist`, `mentionable` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.modifyGuildRolePositions` | `guilds.bulkUpdateGuildRoles` | `guild.id`, `id`, `position` | `guild_id`, `audit_log_reason`, `body` | `id`, `position` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.modifyGuildRole` | `guilds.updateGuildRole` | `guild.id`, `role.id`, `name`, `permissions`, `color`, `hoist`, `mentionable` | `guild_id`, `role_id`, `audit_log_reason`, `body` | `name`, `permissions`, `color`, `hoist`, `mentionable` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.deleteGuildRole` | `guilds.deleteGuildRole` | `guild.id`, `role.id` | `guild_id`, `role_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `guild.getGuildPruneCount` | `guilds.previewPruneGuild` | `guild.id`, `days` | `guild_id`, `days`, `include_roles` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.beginGuildPrune` | `guilds.pruneGuild` | `guild.id`, `days`, `compute_prune_count` | `guild_id`, `audit_log_reason`, `body` | `days`, `compute_prune_count` to `body` | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildVoiceRegions` | `guilds.listGuildVoiceRegions` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildInvites` | `guilds.listGuildInvites` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildIntegrations` | `guilds.listGuildIntegrations` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.createGuildIntegration` | removed | `guild.id`, `type`, `id` | - | `type`, `id` removed | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/resources/guild#get-guild-integrations) |
| `guild.modifyGuildIntegration` | removed | `guild.id`, `integration.id`, `expire_behavior`, `expire_grace_period`, `enable_emoticons` | - | `expire_behavior`, `expire_grace_period`, `enable_emoticons` removed | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/resources/guild#get-guild-integrations) |
| `guild.deleteGuildIntegration` | `guilds.deleteGuildIntegration` | `guild.id`, `integration.id` | `guild_id`, `integration_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `guild.syncGuildIntegration` | removed | `guild.id`, `integration.id` | - | - | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/resources/guild#get-guild-integrations) |
| `guild.getGuildEmbed` | `guilds.getGuildWidgetSettings` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.modifyGuildEmbed` | `guilds.updateGuildWidgetSettings` | `guild.id` | `guild_id`, `audit_log_reason`, `body` | `body` added | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildVanityUrl` | `guilds.getGuildVanityUrl` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `guild.getGuildWidgetImage` | `guilds.getGuildWidgetPng` | `guild.id`, `style` | `guild_id`, `style` | - | `DTO/Result` to `stream` | - |
| `guild.updateNick` | `guilds.updateMyGuildMember` | `guild.id`, `nick` | `guild_id`, `audit_log_reason`, `body` | `nick` to `body` | `DTO/Result` to `decoded JSON` | - |
| `audit-log.getGuildAuditLog` | `guilds.listGuildAuditLogEntries` | `guild.id` | `guild_id`, `user_id`, `target_id`, `action_type`, `before`, `after`, `limit` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.getChannel` | `channels.getChannel` | `channel.id` | `channel_id` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.modifyChannel` | `channels.updateChannel` | `channel.id`, `name`, `position`, `topic`, `nsfw`, `rate_limit_per_user`, `bitrate`, `user_limit`, `permission_overwrites`, `parent_id` | `channel_id`, `audit_log_reason`, `body` | `name`, `position`, `topic`, `nsfw`, `rate_limit_per_user`, `bitrate`, `user_limit`, `permission_overwrites`, `parent_id` to `body` | `DTO/Result` to `decoded JSON` | - |
| `channel.deleteOrcloseChannel` | `channels.deleteChannel` | `channel.id` | `channel_id`, `audit_log_reason` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.getChannelMessages` | `channels.listMessages` | `channel.id`, `around`, `before`, `after`, `limit` | `channel_id`, `around`, `before`, `after`, `limit` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.getChannelMessage` | `channels.getMessage` | `channel.id`, `message.id` | `channel_id`, `message_id` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.createMessage` | `channels.createMessage` | `channel.id`, `content`, `nonce`, `tts`, `file`, `embed`, `payload_json` | `channel_id`, `body` | `content`, `nonce`, `tts` to `body`; `file` to `body.files[0]`; `embed` to `body.embeds[0]`; `payload_json` removed/generated | `DTO/Result` to `decoded JSON` | - |
| `channel.createReaction` | `channels.addMyMessageReaction` | `channel.id`, `message.id`, `emoji` | `channel_id`, `message_id`, `emoji_name` | - | `DTO/Result` to `null` | - |
| `channel.deleteOwnReaction` | `channels.deleteMyMessageReaction` | `channel.id`, `message.id`, `emoji` | `channel_id`, `message_id`, `emoji_name` | - | `DTO/Result` to `null` | - |
| `channel.deleteUserReaction` | `channels.deleteUserMessageReaction` | `channel.id`, `message.id`, `emoji`, `user.id` | `channel_id`, `message_id`, `emoji_name`, `user_id` | - | `DTO/Result` to `null` | - |
| `channel.getReactions` | `channels.listMessageReactionsByEmoji` | `channel.id`, `message.id`, `emoji`, `before`, `after`, `limit` | `channel_id`, `message_id`, `emoji_name`, `after`, `limit`, `type` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.deleteAllReactions` | `channels.deleteAllMessageReactions` | `channel.id`, `message.id` | `channel_id`, `message_id` | - | `DTO/Result` to `null` | - |
| `channel.editMessage` | `channels.updateMessage` | `channel.id`, `message.id`, `content`, `embed` | `channel_id`, `message_id`, `body` | `content` to `body.content`; `embed` to `body.embeds[0]` | `DTO/Result` to `decoded JSON` | - |
| `channel.deleteMessage` | `channels.deleteMessage` | `channel.id`, `message.id` | `channel_id`, `message_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `channel.bulkDeleteMessages` | `channels.bulkDeleteMessages` | `channel.id` | `channel_id`, `audit_log_reason`, `body` | `body` added | `DTO/Result` to `null` | - |
| `channel.editChannelPermissions` | `channels.setChannelPermissionOverwrite` | `channel.id`, `overwrite.id`, `allow`, `deny`, `type` | `channel_id`, `overwrite_id`, `audit_log_reason`, `body` | `allow`, `deny`, `type` to `body` | `DTO/Result` to `null` | - |
| `channel.getChannelInvites` | `channels.listChannelInvites` | `channel.id` | `channel_id` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.createChannelInvite` | `channels.createChannelInvite` | `channel.id`, `max_age`, `max_uses`, `temporary`, `unique` | `channel_id`, `audit_log_reason`, `body` | `max_age`, `max_uses`, `temporary`, `unique` to `body` | `DTO/Result` to `decoded JSON`, `null` | - |
| `channel.deleteChannelPermission` | `channels.deleteChannelPermissionOverwrite` | `channel.id`, `overwrite.id` | `channel_id`, `overwrite_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `channel.triggerTypingIndicator` | `channels.triggerTypingIndicator` | `channel.id` | `channel_id` | - | `DTO/Result` to `decoded JSON`, `null` | - |
| `channel.getPinnedMessages` | `channels.deprecatedListPins` | `channel.id` | `channel_id` | - | `DTO/Result` to `decoded JSON` | - |
| `channel.addPinnedChannelMessage` | `channels.deprecatedCreatePin` | `channel.id`, `message.id` | `channel_id`, `message_id` | - | `DTO/Result` to `null` | - |
| `channel.deletePinnedChannelMessage` | `channels.deprecatedDeletePin` | `channel.id`, `message.id` | `channel_id`, `message_id` | - | `DTO/Result` to `null` | - |
| `channel.groupDmAddRecipient` | `channels.addGroupDmUser` | `channel.id`, `user.id`, `access_token`, `nick` | `channel_id`, `user_id`, `body` | `access_token`, `nick` to `body` | `DTO/Result` to `decoded JSON`, `null` | - |
| `channel.groupDmRemoveRecipient` | `channels.deleteGroupDmUser` | `channel.id`, `user.id` | `channel_id`, `user_id` | - | `DTO/Result` to `null` | - |
| `emoji.listGuildEmojis` | `guilds.listGuildEmojis` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `emoji.getGuildEmoji` | `guilds.getGuildEmoji` | `guild.id`, `emoji.id` | `guild_id`, `emoji_id` | - | `DTO/Result` to `decoded JSON` | - |
| `emoji.createGuildEmoji` | `guilds.createGuildEmoji` | `guild.id`, `name`, `image`, `roles` | `guild_id`, `audit_log_reason`, `body` | `name`, `image`, `roles` to `body` | `DTO/Result` to `decoded JSON` | - |
| `emoji.modifyGuildEmoji` | `guilds.updateGuildEmoji` | `guild.id`, `emoji.id`, `name`, `roles` | `guild_id`, `emoji_id`, `audit_log_reason`, `body` | `name`, `roles` to `body` | `DTO/Result` to `decoded JSON` | - |
| `emoji.deleteGuildEmoji` | `guilds.deleteGuildEmoji` | `guild.id`, `emoji.id` | `guild_id`, `emoji_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `invite.getInvite` | `invites.inviteResolve` | `invite.code` | `code`, `with_counts`, `guild_scheduled_event_id`, `target_channel_id`, `target_message_id` | - | `DTO/Result` to `decoded JSON` | - |
| `invite.deleteInvite` | `invites.inviteRevoke` | `invite.code` | `code`, `audit_log_reason` | - | `DTO/Result` to `decoded JSON` | - |
| `user.getCurrentUser` | `users.getMyUser` | - | - | - | `DTO/Result` to `decoded JSON` | - |
| `user.getUser` | `users.getUser` | `user.id` | `user_id` | - | `DTO/Result` to `decoded JSON` | - |
| `user.modifyCurrentUser` | `users.updateMyUser` | `username`, `avatar` | `body` | `username`, `avatar` to `body` | `DTO/Result` to `decoded JSON` | - |
| `user.getCurrentUserGuilds` | `users.listMyGuilds` | `before`, `after`, `limit` | `before`, `after`, `limit`, `with_counts` | - | `DTO/Result` to `decoded JSON` | - |
| `user.leaveGuild` | `users.leaveGuild` | `guild.id` | `guild_id` | - | `DTO/Result` to `null` | - |
| `user.getUserDms` | removed | - | - | - | `DTO/Result` to unavailable | [Discord source](https://docs.discord.com/developers/resources/user) |
| `user.createDm` | `users.createDm` | `recipient_id` | `body` | `recipient_id` to `body` | `DTO/Result` to `decoded JSON` | - |
| `user.createGroupDm` | `users.createDm` | `access_tokens`, `nicks` | `body` | `access_tokens`, `nicks` to `body` | `DTO/Result` to `decoded JSON` | - |
| `user.getUserConnections` | `users.listMyConnections` | - | - | - | `DTO/Result` to `decoded JSON` | - |
| `voice.listVoiceRegions` | `voice.listVoiceRegions` | - | - | - | `DTO/Result` to `decoded JSON` | - |
| `webhook.createWebhook` | `channels.createWebhook` | `channel.id`, `name`, `avatar` | `channel_id`, `audit_log_reason`, `body` | `name`, `avatar` to `body` | `DTO/Result` to `decoded JSON` | - |
| `webhook.getChannelWebhooks` | `channels.listChannelWebhooks` | `channel.id` | `channel_id` | - | `DTO/Result` to `decoded JSON` | - |
| `webhook.getGuildWebhooks` | `guilds.getGuildWebhooks` | `guild.id` | `guild_id` | - | `DTO/Result` to `decoded JSON` | - |
| `webhook.getWebhook` | `webhooks.getWebhook` | `webhook.id` | `webhook_id` | - | `DTO/Result` to `decoded JSON` | - |
| `webhook.getWebhookWithToken` | `webhooks.getWebhookByToken` | `webhook.id`, `webhook.token` | `webhook_id`, `webhook_token` | - | `DTO/Result` to `decoded JSON` | - |
| `webhook.modifyWebhook` | `webhooks.updateWebhook` | `webhook.id`, `name`, `avatar`, `channel_id` | `webhook_id`, `audit_log_reason`, `body` | `name`, `avatar`, `channel_id` to `body` | `DTO/Result` to `decoded JSON` | - |
| `webhook.modifyWebhookWithToken` | `webhooks.updateWebhookByToken` | `webhook.id`, `webhook.token` | `webhook_id`, `webhook_token`, `body` | `body` added | `DTO/Result` to `decoded JSON` | - |
| `webhook.deleteWebhook` | `webhooks.deleteWebhook` | `webhook.id` | `webhook_id`, `audit_log_reason` | - | `DTO/Result` to `null` | - |
| `webhook.deleteWebhookWithToken` | `webhooks.deleteWebhookByToken` | `webhook.id`, `webhook.token` | `webhook_id`, `webhook_token` | - | `DTO/Result` to `null` | - |
| `webhook.executeWebhook` | `webhooks.executeWebhook` | `webhook.id`, `webhook.token`, `wait`, `content`, `username`, `avatar_url`, `tts`, `file`, `embeds`, `payload_json` | `webhook_id`, `webhook_token`, `wait`, `thread_id`, `with_components`, `body` | JSON fields to `body`; `file` to `body.files[0]`; `payload_json` removed/generated | `DTO/Result` to `decoded JSON`, `null` | - |
| `webhook.executeSlackCompatibleWebhook` | `webhooks.executeSlackCompatibleWebhook` | `webhook.id`, `webhook.token`, `wait` | `webhook_id`, `webhook_token`, `wait`, `thread_id`, `body` | `body` added | `DTO/Result` to `decoded JSON` | - |
| `webhook.executeGithubCompatibleWebhook` | `webhooks.executeGithubCompatibleWebhook` | `webhook.id`, `webhook.token`, `wait` | `webhook_id`, `webhook_token`, `wait`, `thread_id`, `body` | `body` added | `DTO/Result` to `null` | - |
| `gateway.getGateway` | `gateway.getGateway` | - | - | - | `DTO/Result` to `decoded JSON` | - |
| `gateway.getGatewayBot` | `gateway.getBotGateway` | `total`, `remaining`, `reset_after` | - | `total`, `remaining`, `reset_after` removed | `DTO/Result` to `decoded JSON` | - |
| `oauth2.getCurrentApplicationInformation` | `oauth2.getMyOauth2Application` | `id`, `name`, `icon`, `description`, `rpc_origins?`, `bot_public`, `bot_require_code_grant`, `owner` | - | `id`, `name`, `icon`, `description`, `rpc_origins?`, `bot_public`, `bot_require_code_grant`, `owner` removed | `DTO/Result` to `decoded JSON` | - |

## reviewed normalized mismatches

The normalized comparison treats each route placeholder as one position. These 11 legacy calls have no current method and route match.

`guild.createGuild`, `guild.deleteGuild`, `guild.modifyCurrentUserNick`, `guild.createGuildIntegration`, `guild.modifyGuildIntegration`, `guild.syncGuildIntegration`, `guild.getGuildEmbed`, `guild.modifyGuildEmbed`, `guild.updateNick`, `channel.bulkDeleteMessages`, `user.getUserDms`

The table records each reviewed destination or removal. `guild.modifyCurrentUserNick` and `guild.updateNick` are duplicate legacy nick calls.
