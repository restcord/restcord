<?php

declare(strict_types=1);

return array (
  '_meta' =>
  array (
    'source' =>
    array (
      'repository' => 'discord/discord-api-spec',
      'path' => 'specs/openapi.json',
      'commit' => '4e5c3dbe385cc148dde582325314e598fddbd7a9',
      'checksum' => '49efa428e0dd5babf5527aa3046e2d29d0c3d9daef2c7100c2619cb440c57cf6',
    ),
    'openapiVersion' => '3.1.0',
    'apiVersion' => '10',
    'pathCount' => 150,
    'operationCount' => 242,
  ),
  'operations' =>
  array (
    'get_my_application' =>
    array (
      'category' => 'applications',
      'method' => 'getMyApplication',
      'operationId' => 'get_my_application',
      'httpMethod' => 'GET',
      'path' => '/applications/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_my_application' =>
    array (
      'category' => 'applications',
      'method' => 'updateMyApplication',
      'operationId' => 'update_my_application',
      'httpMethod' => 'PATCH',
      'path' => '/applications/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_application' =>
    array (
      'category' => 'applications',
      'method' => 'getApplication',
      'operationId' => 'get_application',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_application' =>
    array (
      'category' => 'applications',
      'method' => 'updateApplication',
      'operationId' => 'update_application',
      'httpMethod' => 'PATCH',
      'path' => '/applications/{application_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'applications_get_activity_instance' =>
    array (
      'category' => 'applications',
      'method' => 'applicationsGetActivityInstance',
      'operationId' => 'applications_get_activity_instance',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/activity-instances/{instance_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'instance_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'upload_application_attachment' =>
    array (
      'category' => 'applications',
      'method' => 'uploadApplicationAttachment',
      'operationId' => 'upload_application_attachment',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/attachment',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'activities.invites.write',
            1 => 'activities.read',
            2 => 'activities.write',
            3 => 'applications.builds.read',
            4 => 'applications.builds.upload',
            5 => 'applications.commands',
            6 => 'applications.commands.permissions.update',
            7 => 'applications.commands.update',
            8 => 'applications.entitlements',
            9 => 'applications.store.update',
            10 => 'bot',
            11 => 'connections',
            12 => 'dm_channels.read',
            13 => 'email',
            14 => 'gdm.join',
            15 => 'guilds',
            16 => 'guilds.join',
            17 => 'guilds.members.read',
            18 => 'identify',
            19 => 'messages.read',
            20 => 'openid',
            21 => 'relationships.read',
            22 => 'role_connections.write',
            23 => 'rpc',
            24 => 'rpc.activities.write',
            25 => 'rpc.notifications.read',
            26 => 'rpc.screenshare.read',
            27 => 'rpc.screenshare.write',
            28 => 'rpc.video.read',
            29 => 'rpc.video.write',
            30 => 'rpc.voice.read',
            31 => 'rpc.voice.write',
            32 => 'voice',
            33 => 'webhook.incoming',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'file',
        ),
      ),
    ),
    'list_application_commands' =>
    array (
      'category' => 'applications',
      'method' => 'listApplicationCommands',
      'operationId' => 'list_application_commands',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'with_localizations',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'bulk_set_application_commands' =>
    array (
      'category' => 'applications',
      'method' => 'bulkSetApplicationCommands',
      'operationId' => 'bulk_set_application_commands',
      'httpMethod' => 'PUT',
      'path' => '/applications/{application_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'create_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'createApplicationCommand',
      'operationId' => 'create_application_command',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'getApplicationCommand',
      'operationId' => 'get_application_command',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'delete_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'deleteApplicationCommand',
      'operationId' => 'delete_application_command',
      'httpMethod' => 'DELETE',
      'path' => '/applications/{application_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'updateApplicationCommand',
      'operationId' => 'update_application_command',
      'httpMethod' => 'PATCH',
      'path' => '/applications/{application_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_application_emojis' =>
    array (
      'category' => 'applications',
      'method' => 'listApplicationEmojis',
      'operationId' => 'list_application_emojis',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/emojis',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_application_emoji' =>
    array (
      'category' => 'applications',
      'method' => 'createApplicationEmoji',
      'operationId' => 'create_application_emoji',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/emojis',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_application_emoji' =>
    array (
      'category' => 'applications',
      'method' => 'getApplicationEmoji',
      'operationId' => 'get_application_emoji',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'delete_application_emoji' =>
    array (
      'category' => 'applications',
      'method' => 'deleteApplicationEmoji',
      'operationId' => 'delete_application_emoji',
      'httpMethod' => 'DELETE',
      'path' => '/applications/{application_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_application_emoji' =>
    array (
      'category' => 'applications',
      'method' => 'updateApplicationEmoji',
      'operationId' => 'update_application_emoji',
      'httpMethod' => 'PATCH',
      'path' => '/applications/{application_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_entitlements' =>
    array (
      'category' => 'applications',
      'method' => 'getEntitlements',
      'operationId' => 'get_entitlements',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/entitlements',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'sku_ids',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'guild_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        6 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        7 =>
        array (
          'name' => 'exclude_ended',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        8 =>
        array (
          'name' => 'exclude_deleted',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        9 =>
        array (
          'name' => 'only_active',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.entitlements',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_entitlement' =>
    array (
      'category' => 'applications',
      'method' => 'createEntitlement',
      'operationId' => 'create_entitlement',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/entitlements',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_entitlement' =>
    array (
      'category' => 'applications',
      'method' => 'getEntitlement',
      'operationId' => 'get_entitlement',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/entitlements/{entitlement_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'entitlement_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.entitlements',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'delete_entitlement' =>
    array (
      'category' => 'applications',
      'method' => 'deleteEntitlement',
      'operationId' => 'delete_entitlement',
      'httpMethod' => 'DELETE',
      'path' => '/applications/{application_id}/entitlements/{entitlement_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'entitlement_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.entitlements',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'consume_entitlement' =>
    array (
      'category' => 'applications',
      'method' => 'consumeEntitlement',
      'operationId' => 'consume_entitlement',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/entitlements/{entitlement_id}/consume',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'entitlement_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.entitlements',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'list_guild_application_commands' =>
    array (
      'category' => 'applications',
      'method' => 'listGuildApplicationCommands',
      'operationId' => 'list_guild_application_commands',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'with_localizations',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'bulk_set_guild_application_commands' =>
    array (
      'category' => 'applications',
      'method' => 'bulkSetGuildApplicationCommands',
      'operationId' => 'bulk_set_guild_application_commands',
      'httpMethod' => 'PUT',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'create_guild_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'createGuildApplicationCommand',
      'operationId' => 'create_guild_application_command',
      'httpMethod' => 'POST',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_application_command_permissions' =>
    array (
      'category' => 'applications',
      'method' => 'listGuildApplicationCommandPermissions',
      'operationId' => 'list_guild_application_command_permissions',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/permissions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.permissions.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'getGuildApplicationCommand',
      'operationId' => 'get_guild_application_command',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'deleteGuildApplicationCommand',
      'operationId' => 'delete_guild_application_command',
      'httpMethod' => 'DELETE',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_application_command' =>
    array (
      'category' => 'applications',
      'method' => 'updateGuildApplicationCommand',
      'operationId' => 'update_guild_application_command',
      'httpMethod' => 'PATCH',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/{command_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_application_command_permissions' =>
    array (
      'category' => 'applications',
      'method' => 'getGuildApplicationCommandPermissions',
      'operationId' => 'get_guild_application_command_permissions',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/{command_id}/permissions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.permissions.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'set_guild_application_command_permissions' =>
    array (
      'category' => 'applications',
      'method' => 'setGuildApplicationCommandPermissions',
      'operationId' => 'set_guild_application_command_permissions',
      'httpMethod' => 'PUT',
      'path' => '/applications/{application_id}/guilds/{guild_id}/commands/{command_id}/permissions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'command_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'applications.commands.permissions.update',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_application_role_connections_metadata' =>
    array (
      'category' => 'applications',
      'method' => 'getApplicationRoleConnectionsMetadata',
      'operationId' => 'get_application_role_connections_metadata',
      'httpMethod' => 'GET',
      'path' => '/applications/{application_id}/role-connections/metadata',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_application_role_connections_metadata' =>
    array (
      'category' => 'applications',
      'method' => 'updateApplicationRoleConnectionsMetadata',
      'operationId' => 'update_application_role_connections_metadata',
      'httpMethod' => 'PUT',
      'path' => '/applications/{application_id}/role-connections/metadata',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_channel' =>
    array (
      'category' => 'channels',
      'method' => 'getChannel',
      'operationId' => 'get_channel',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_channel' =>
    array (
      'category' => 'channels',
      'method' => 'deleteChannel',
      'operationId' => 'delete_channel',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'update_channel' =>
    array (
      'category' => 'channels',
      'method' => 'updateChannel',
      'operationId' => 'update_channel',
      'httpMethod' => 'PATCH',
      'path' => '/channels/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'follow_channel' =>
    array (
      'category' => 'channels',
      'method' => 'followChannel',
      'operationId' => 'follow_channel',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/followers',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_channel_invites' =>
    array (
      'category' => 'channels',
      'method' => 'listChannelInvites',
      'operationId' => 'list_channel_invites',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/invites',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_channel_invite' =>
    array (
      'category' => 'channels',
      'method' => 'createChannelInvite',
      'operationId' => 'create_channel_invite',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/invites',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'target_users_file',
        ),
      ),
    ),
    'list_messages' =>
    array (
      'category' => 'channels',
      'method' => 'listMessages',
      'operationId' => 'list_messages',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/messages',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'around',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_message' =>
    array (
      'category' => 'channels',
      'method' => 'createMessage',
      'operationId' => 'create_message',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/messages',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'bulk_delete_messages' =>
    array (
      'category' => 'channels',
      'method' => 'bulkDeleteMessages',
      'operationId' => 'bulk_delete_messages',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/messages/bulk-delete',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_pins' =>
    array (
      'category' => 'channels',
      'method' => 'listPins',
      'operationId' => 'list_pins',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/messages/pins',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_pin' =>
    array (
      'category' => 'channels',
      'method' => 'createPin',
      'operationId' => 'create_pin',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/messages/pins/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_pin' =>
    array (
      'category' => 'channels',
      'method' => 'deletePin',
      'operationId' => 'delete_pin',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/pins/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'get_message' =>
    array (
      'category' => 'channels',
      'method' => 'getMessage',
      'operationId' => 'get_message',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_message' =>
    array (
      'category' => 'channels',
      'method' => 'deleteMessage',
      'operationId' => 'delete_message',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'update_message' =>
    array (
      'category' => 'channels',
      'method' => 'updateMessage',
      'operationId' => 'update_message',
      'httpMethod' => 'PATCH',
      'path' => '/channels/{channel_id}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'crosspost_message' =>
    array (
      'category' => 'channels',
      'method' => 'crosspostMessage',
      'operationId' => 'crosspost_message',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/messages/{message_id}/crosspost',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_all_message_reactions' =>
    array (
      'category' => 'channels',
      'method' => 'deleteAllMessageReactions',
      'operationId' => 'delete_all_message_reactions',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'list_message_reactions_by_emoji' =>
    array (
      'category' => 'channels',
      'method' => 'listMessageReactionsByEmoji',
      'operationId' => 'list_message_reactions_by_emoji',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions/{emoji_name}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'emoji_name',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'type',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_all_message_reactions_by_emoji' =>
    array (
      'category' => 'channels',
      'method' => 'deleteAllMessageReactionsByEmoji',
      'operationId' => 'delete_all_message_reactions_by_emoji',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions/{emoji_name}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'emoji_name',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'add_my_message_reaction' =>
    array (
      'category' => 'channels',
      'method' => 'addMyMessageReaction',
      'operationId' => 'add_my_message_reaction',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions/{emoji_name}/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'emoji_name',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_my_message_reaction' =>
    array (
      'category' => 'channels',
      'method' => 'deleteMyMessageReaction',
      'operationId' => 'delete_my_message_reaction',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions/{emoji_name}/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'emoji_name',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_user_message_reaction' =>
    array (
      'category' => 'channels',
      'method' => 'deleteUserMessageReaction',
      'operationId' => 'delete_user_message_reaction',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/messages/{message_id}/reactions/{emoji_name}/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'emoji_name',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_thread_from_message' =>
    array (
      'category' => 'channels',
      'method' => 'createThreadFromMessage',
      'operationId' => 'create_thread_from_message',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/messages/{message_id}/threads',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'set_channel_permission_overwrite' =>
    array (
      'category' => 'channels',
      'method' => 'setChannelPermissionOverwrite',
      'operationId' => 'set_channel_permission_overwrite',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/permissions/{overwrite_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'overwrite_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_channel_permission_overwrite' =>
    array (
      'category' => 'channels',
      'method' => 'deleteChannelPermissionOverwrite',
      'operationId' => 'delete_channel_permission_overwrite',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/permissions/{overwrite_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'overwrite_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'deprecated_list_pins' =>
    array (
      'category' => 'channels',
      'method' => 'deprecatedListPins',
      'operationId' => 'deprecated_list_pins',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/pins',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'deprecated_create_pin' =>
    array (
      'category' => 'channels',
      'method' => 'deprecatedCreatePin',
      'operationId' => 'deprecated_create_pin',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/pins/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'deprecated_delete_pin' =>
    array (
      'category' => 'channels',
      'method' => 'deprecatedDeletePin',
      'operationId' => 'deprecated_delete_pin',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/pins/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'get_answer_voters' =>
    array (
      'category' => 'channels',
      'method' => 'getAnswerVoters',
      'operationId' => 'get_answer_voters',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/polls/{message_id}/answers/{answer_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'answer_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'poll_expire' =>
    array (
      'category' => 'channels',
      'method' => 'pollExpire',
      'operationId' => 'poll_expire',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/polls/{message_id}/expire',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'add_group_dm_user' =>
    array (
      'category' => 'channels',
      'method' => 'addGroupDmUser',
      'operationId' => 'add_group_dm_user',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/recipients/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_group_dm_user' =>
    array (
      'category' => 'channels',
      'method' => 'deleteGroupDmUser',
      'operationId' => 'delete_group_dm_user',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/recipients/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'send_soundboard_sound' =>
    array (
      'category' => 'channels',
      'method' => 'sendSoundboardSound',
      'operationId' => 'send_soundboard_sound',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/send-soundboard-sound',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_thread_members' =>
    array (
      'category' => 'channels',
      'method' => 'listThreadMembers',
      'operationId' => 'list_thread_members',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/thread-members',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'with_member',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'join_thread' =>
    array (
      'category' => 'channels',
      'method' => 'joinThread',
      'operationId' => 'join_thread',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/thread-members/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'leave_thread' =>
    array (
      'category' => 'channels',
      'method' => 'leaveThread',
      'operationId' => 'leave_thread',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/thread-members/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'get_thread_member' =>
    array (
      'category' => 'channels',
      'method' => 'getThreadMember',
      'operationId' => 'get_thread_member',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/thread-members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'with_member',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'add_thread_member' =>
    array (
      'category' => 'channels',
      'method' => 'addThreadMember',
      'operationId' => 'add_thread_member',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/thread-members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_thread_member' =>
    array (
      'category' => 'channels',
      'method' => 'deleteThreadMember',
      'operationId' => 'delete_thread_member',
      'httpMethod' => 'DELETE',
      'path' => '/channels/{channel_id}/thread-members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_thread' =>
    array (
      'category' => 'channels',
      'method' => 'createThread',
      'operationId' => 'create_thread',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/threads',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'list_private_archived_threads' =>
    array (
      'category' => 'channels',
      'method' => 'listPrivateArchivedThreads',
      'operationId' => 'list_private_archived_threads',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/threads/archived/private',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'list_public_archived_threads' =>
    array (
      'category' => 'channels',
      'method' => 'listPublicArchivedThreads',
      'operationId' => 'list_public_archived_threads',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/threads/archived/public',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'thread_search' =>
    array (
      'category' => 'channels',
      'method' => 'threadSearch',
      'operationId' => 'thread_search',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/threads/search',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'name',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'slop',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'min_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'max_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'tag',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        6 =>
        array (
          'name' => 'tag_setting',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        7 =>
        array (
          'name' => 'archived',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        8 =>
        array (
          'name' => 'sort_by',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        9 =>
        array (
          'name' => 'sort_order',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        10 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        11 =>
        array (
          'name' => 'offset',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        202 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'trigger_typing_indicator' =>
    array (
      'category' => 'channels',
      'method' => 'triggerTypingIndicator',
      'operationId' => 'trigger_typing_indicator',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/typing',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'list_my_private_archived_threads' =>
    array (
      'category' => 'channels',
      'method' => 'listMyPrivateArchivedThreads',
      'operationId' => 'list_my_private_archived_threads',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/users/@me/threads/archived/private',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'update_voice_channel_status' =>
    array (
      'category' => 'channels',
      'method' => 'updateVoiceChannelStatus',
      'operationId' => 'update_voice_channel_status',
      'httpMethod' => 'PUT',
      'path' => '/channels/{channel_id}/voice-status',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_channel_webhooks' =>
    array (
      'category' => 'channels',
      'method' => 'listChannelWebhooks',
      'operationId' => 'list_channel_webhooks',
      'httpMethod' => 'GET',
      'path' => '/channels/{channel_id}/webhooks',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'create_webhook' =>
    array (
      'category' => 'channels',
      'method' => 'createWebhook',
      'operationId' => 'create_webhook',
      'httpMethod' => 'POST',
      'path' => '/channels/{channel_id}/webhooks',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_gateway' =>
    array (
      'category' => 'gateway',
      'method' => 'getGateway',
      'operationId' => 'get_gateway',
      'httpMethod' => 'GET',
      'path' => '/gateway',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_bot_gateway' =>
    array (
      'category' => 'gateway',
      'method' => 'getBotGateway',
      'operationId' => 'get_bot_gateway',
      'httpMethod' => 'GET',
      'path' => '/gateway/bot',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_guild_template' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildTemplate',
      'operationId' => 'get_guild_template',
      'httpMethod' => 'GET',
      'path' => '/guilds/templates/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuild',
      'operationId' => 'get_guild',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'with_counts',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuild',
      'operationId' => 'update_guild',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_audit_log_entries' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildAuditLogEntries',
      'operationId' => 'list_guild_audit_log_entries',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/audit-logs',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'target_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'action_type',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        6 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'list_auto_moderation_rules' =>
    array (
      'category' => 'guilds',
      'method' => 'listAutoModerationRules',
      'operationId' => 'list_auto_moderation_rules',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/auto-moderation/rules',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_auto_moderation_rule' =>
    array (
      'category' => 'guilds',
      'method' => 'createAutoModerationRule',
      'operationId' => 'create_auto_moderation_rule',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/auto-moderation/rules',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_auto_moderation_rule' =>
    array (
      'category' => 'guilds',
      'method' => 'getAutoModerationRule',
      'operationId' => 'get_auto_moderation_rule',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/auto-moderation/rules/{rule_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'rule_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_auto_moderation_rule' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteAutoModerationRule',
      'operationId' => 'delete_auto_moderation_rule',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/auto-moderation/rules/{rule_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'rule_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_auto_moderation_rule' =>
    array (
      'category' => 'guilds',
      'method' => 'updateAutoModerationRule',
      'operationId' => 'update_auto_moderation_rule',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/auto-moderation/rules/{rule_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'rule_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_bans' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildBans',
      'operationId' => 'list_guild_bans',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/bans',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_ban' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildBan',
      'operationId' => 'get_guild_ban',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/bans/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'ban_user_from_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'banUserFromGuild',
      'operationId' => 'ban_user_from_guild',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/bans/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'unban_user_from_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'unbanUserFromGuild',
      'operationId' => 'unban_user_from_guild',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/bans/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'bulk_ban_users_from_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'bulkBanUsersFromGuild',
      'operationId' => 'bulk_ban_users_from_guild',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/bulk-ban',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_channels' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildChannels',
      'operationId' => 'list_guild_channels',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/channels',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_channel' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildChannel',
      'operationId' => 'create_guild_channel',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/channels',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'bulk_update_guild_channels' =>
    array (
      'category' => 'guilds',
      'method' => 'bulkUpdateGuildChannels',
      'operationId' => 'bulk_update_guild_channels',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/channels',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_emojis' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildEmojis',
      'operationId' => 'list_guild_emojis',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/emojis',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_emoji' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildEmoji',
      'operationId' => 'create_guild_emoji',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/emojis',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_emoji' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildEmoji',
      'operationId' => 'get_guild_emoji',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_emoji' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildEmoji',
      'operationId' => 'delete_guild_emoji',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_emoji' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildEmoji',
      'operationId' => 'update_guild_emoji',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/emojis/{emoji_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'emoji_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'update_guild_incident_actions' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildIncidentActions',
      'operationId' => 'update_guild_incident_actions',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/incident-actions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_integrations' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildIntegrations',
      'operationId' => 'list_guild_integrations',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/integrations',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_integration' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildIntegration',
      'operationId' => 'delete_guild_integration',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/integrations/{integration_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'integration_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'list_guild_invites' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildInvites',
      'operationId' => 'list_guild_invites',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/invites',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'list_guild_members' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildMembers',
      'operationId' => 'list_guild_members',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/members',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_my_guild_member' =>
    array (
      'category' => 'guilds',
      'method' => 'updateMyGuildMember',
      'operationId' => 'update_my_guild_member',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/members/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'search_guild_members' =>
    array (
      'category' => 'guilds',
      'method' => 'searchGuildMembers',
      'operationId' => 'search_guild_members',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/members/search',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'query',
          'location' => 'query',
          'required' => true,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_member' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildMember',
      'operationId' => 'get_guild_member',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'add_guild_member' =>
    array (
      'category' => 'guilds',
      'method' => 'addGuildMember',
      'operationId' => 'add_guild_member',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_guild_member' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildMember',
      'operationId' => 'delete_guild_member',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_member' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildMember',
      'operationId' => 'update_guild_member',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'add_guild_member_role' =>
    array (
      'category' => 'guilds',
      'method' => 'addGuildMemberRole',
      'operationId' => 'add_guild_member_role',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/members/{user_id}/roles/{role_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'role_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_member_role' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildMemberRole',
      'operationId' => 'delete_guild_member_role',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/members/{user_id}/roles/{role_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'role_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'guild_search' =>
    array (
      'category' => 'guilds',
      'method' => 'guildSearch',
      'operationId' => 'guild_search',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/messages/search',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sort_by',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'sort_order',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'content',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'slop',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'author_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        6 =>
        array (
          'name' => 'author_type',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        7 =>
        array (
          'name' => 'mentions',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        8 =>
        array (
          'name' => 'mentions_role_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        9 =>
        array (
          'name' => 'replied_to_user_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        10 =>
        array (
          'name' => 'replied_to_message_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        11 =>
        array (
          'name' => 'mention_everyone',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        12 =>
        array (
          'name' => 'min_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        13 =>
        array (
          'name' => 'max_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        14 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        15 =>
        array (
          'name' => 'offset',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        16 =>
        array (
          'name' => 'has',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        17 =>
        array (
          'name' => 'link_hostname',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        18 =>
        array (
          'name' => 'embed_provider',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        19 =>
        array (
          'name' => 'embed_type',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        20 =>
        array (
          'name' => 'attachment_extension',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        21 =>
        array (
          'name' => 'attachment_filename',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        22 =>
        array (
          'name' => 'pinned',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        23 =>
        array (
          'name' => 'include_nsfw',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        24 =>
        array (
          'name' => 'channel_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        202 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_new_member_welcome' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildNewMemberWelcome',
      'operationId' => 'get_guild_new_member_welcome',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/new-member-welcome',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guilds_onboarding' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildsOnboarding',
      'operationId' => 'get_guilds_onboarding',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/onboarding',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'put_guilds_onboarding' =>
    array (
      'category' => 'guilds',
      'method' => 'putGuildsOnboarding',
      'operationId' => 'put_guilds_onboarding',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/onboarding',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_preview' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildPreview',
      'operationId' => 'get_guild_preview',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/preview',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'preview_prune_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'previewPruneGuild',
      'operationId' => 'preview_prune_guild',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/prune',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'days',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'include_roles',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'prune_guild' =>
    array (
      'category' => 'guilds',
      'method' => 'pruneGuild',
      'operationId' => 'prune_guild',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/prune',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_voice_regions' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildVoiceRegions',
      'operationId' => 'list_guild_voice_regions',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/regions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_join_requests' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildJoinRequests',
      'operationId' => 'get_guild_join_requests',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/requests',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'status',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'action_guild_join_request' =>
    array (
      'category' => 'guilds',
      'method' => 'actionGuildJoinRequest',
      'operationId' => 'action_guild_join_request',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/requests/{request_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'request_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_roles' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildRoles',
      'operationId' => 'list_guild_roles',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/roles',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_role' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildRole',
      'operationId' => 'create_guild_role',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/roles',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'bulk_update_guild_roles' =>
    array (
      'category' => 'guilds',
      'method' => 'bulkUpdateGuildRoles',
      'operationId' => 'bulk_update_guild_roles',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/roles',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'guild_role_member_counts' =>
    array (
      'category' => 'guilds',
      'method' => 'guildRoleMemberCounts',
      'operationId' => 'guild_role_member_counts',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/roles/member-counts',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_role' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildRole',
      'operationId' => 'get_guild_role',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/roles/{role_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'role_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_role' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildRole',
      'operationId' => 'delete_guild_role',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/roles/{role_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'role_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_role' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildRole',
      'operationId' => 'update_guild_role',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/roles/{role_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'role_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_scheduled_events' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildScheduledEvents',
      'operationId' => 'list_guild_scheduled_events',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/scheduled-events',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'with_user_count',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_scheduled_event' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildScheduledEvent',
      'operationId' => 'create_guild_scheduled_event',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/scheduled-events',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_scheduled_event' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildScheduledEvent',
      'operationId' => 'get_guild_scheduled_event',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'with_user_count',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_scheduled_event' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildScheduledEvent',
      'operationId' => 'delete_guild_scheduled_event',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_scheduled_event' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildScheduledEvent',
      'operationId' => 'update_guild_scheduled_event',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'create_guild_scheduled_event_exception' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildScheduledEventException',
      'operationId' => 'create_guild_scheduled_event_exception',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/exceptions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_guild_scheduled_event_exception' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildScheduledEventException',
      'operationId' => 'delete_guild_scheduled_event_exception',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/exceptions/{exception_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'exception_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_scheduled_event_exception' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildScheduledEventException',
      'operationId' => 'update_guild_scheduled_event_exception',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/exceptions/{exception_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'exception_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_scheduled_event_users' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildScheduledEventUsers',
      'operationId' => 'list_guild_scheduled_event_users',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/users',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'with_member',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'count_guild_scheduled_event_users' =>
    array (
      'category' => 'guilds',
      'method' => 'countGuildScheduledEventUsers',
      'operationId' => 'count_guild_scheduled_event_users',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/users/counts',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'guild_scheduled_event_exception_ids',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'list_guild_scheduled_event_exception_users' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildScheduledEventExceptionUsers',
      'operationId' => 'list_guild_scheduled_event_exception_users',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/scheduled-events/{guild_scheduled_event_id}/{guild_scheduled_event_exception_id}/users',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'guild_scheduled_event_exception_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'with_member',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        5 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        6 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'list_guild_soundboard_sounds' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildSoundboardSounds',
      'operationId' => 'list_guild_soundboard_sounds',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/soundboard-sounds',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_soundboard_sound' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildSoundboardSound',
      'operationId' => 'create_guild_soundboard_sound',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/soundboard-sounds',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_soundboard_sound' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildSoundboardSound',
      'operationId' => 'get_guild_soundboard_sound',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/soundboard-sounds/{sound_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sound_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_soundboard_sound' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildSoundboardSound',
      'operationId' => 'delete_guild_soundboard_sound',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/soundboard-sounds/{sound_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sound_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_soundboard_sound' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildSoundboardSound',
      'operationId' => 'update_guild_soundboard_sound',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/soundboard-sounds/{sound_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sound_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_stickers' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildStickers',
      'operationId' => 'list_guild_stickers',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/stickers',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_sticker' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildSticker',
      'operationId' => 'create_guild_sticker',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/stickers',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'file',
        ),
      ),
    ),
    'get_guild_sticker' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildSticker',
      'operationId' => 'get_guild_sticker',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/stickers/{sticker_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sticker_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_sticker' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildSticker',
      'operationId' => 'delete_guild_sticker',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/stickers/{sticker_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sticker_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_sticker' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildSticker',
      'operationId' => 'update_guild_sticker',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/stickers/{sticker_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sticker_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_guild_templates' =>
    array (
      'category' => 'guilds',
      'method' => 'listGuildTemplates',
      'operationId' => 'list_guild_templates',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/templates',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_guild_template' =>
    array (
      'category' => 'guilds',
      'method' => 'createGuildTemplate',
      'operationId' => 'create_guild_template',
      'httpMethod' => 'POST',
      'path' => '/guilds/{guild_id}/templates',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'sync_guild_template' =>
    array (
      'category' => 'guilds',
      'method' => 'syncGuildTemplate',
      'operationId' => 'sync_guild_template',
      'httpMethod' => 'PUT',
      'path' => '/guilds/{guild_id}/templates/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'delete_guild_template' =>
    array (
      'category' => 'guilds',
      'method' => 'deleteGuildTemplate',
      'operationId' => 'delete_guild_template',
      'httpMethod' => 'DELETE',
      'path' => '/guilds/{guild_id}/templates/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_template' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildTemplate',
      'operationId' => 'update_guild_template',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/templates/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_active_guild_threads' =>
    array (
      'category' => 'guilds',
      'method' => 'getActiveGuildThreads',
      'operationId' => 'get_active_guild_threads',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/threads/active',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_vanity_url' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildVanityUrl',
      'operationId' => 'get_guild_vanity_url',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/vanity-url',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_self_voice_state' =>
    array (
      'category' => 'guilds',
      'method' => 'getSelfVoiceState',
      'operationId' => 'get_self_voice_state',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/voice-states/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_self_voice_state' =>
    array (
      'category' => 'guilds',
      'method' => 'updateSelfVoiceState',
      'operationId' => 'update_self_voice_state',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/voice-states/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_voice_state' =>
    array (
      'category' => 'guilds',
      'method' => 'getVoiceState',
      'operationId' => 'get_voice_state',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/voice-states/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_voice_state' =>
    array (
      'category' => 'guilds',
      'method' => 'updateVoiceState',
      'operationId' => 'update_voice_state',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/voice-states/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_webhooks' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildWebhooks',
      'operationId' => 'get_guild_webhooks',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/webhooks',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_welcome_screen' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildWelcomeScreen',
      'operationId' => 'get_guild_welcome_screen',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/welcome-screen',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_welcome_screen' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildWelcomeScreen',
      'operationId' => 'update_guild_welcome_screen',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/welcome-screen',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_widget_settings' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildWidgetSettings',
      'operationId' => 'get_guild_widget_settings',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/widget',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'update_guild_widget_settings' =>
    array (
      'category' => 'guilds',
      'method' => 'updateGuildWidgetSettings',
      'operationId' => 'update_guild_widget_settings',
      'httpMethod' => 'PATCH',
      'path' => '/guilds/{guild_id}/widget',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_guild_widget' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildWidget',
      'operationId' => 'get_guild_widget',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/widget.json',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_guild_widget_png' =>
    array (
      'category' => 'guilds',
      'method' => 'getGuildWidgetPng',
      'operationId' => 'get_guild_widget_png',
      'httpMethod' => 'GET',
      'path' => '/guilds/{guild_id}/widget.png',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'style',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'stream',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'create_interaction_response' =>
    array (
      'category' => 'interactions',
      'method' => 'createInteractionResponse',
      'operationId' => 'create_interaction_response',
      'httpMethod' => 'POST',
      'path' => '/interactions/{interaction_id}/{interaction_token}/callback',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'interaction_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'interaction_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'with_response',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => true,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'invite_resolve' =>
    array (
      'category' => 'invites',
      'method' => 'inviteResolve',
      'operationId' => 'invite_resolve',
      'httpMethod' => 'GET',
      'path' => '/invites/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'with_counts',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'guild_scheduled_event_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'target_channel_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'target_message_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'invite_revoke' =>
    array (
      'category' => 'invites',
      'method' => 'inviteRevoke',
      'operationId' => 'invite_revoke',
      'httpMethod' => 'DELETE',
      'path' => '/invites/{code}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_invite_target_users' =>
    array (
      'category' => 'invites',
      'method' => 'getInviteTargetUsers',
      'operationId' => 'get_invite_target_users',
      'httpMethod' => 'GET',
      'path' => '/invites/{code}/target-users',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'stream',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_invite_target_users' =>
    array (
      'category' => 'invites',
      'method' => 'updateInviteTargetUsers',
      'operationId' => 'update_invite_target_users',
      'httpMethod' => 'PUT',
      'path' => '/invites/{code}/target-users',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'target_users_file',
        ),
      ),
    ),
    'get_invite_target_users_job_status' =>
    array (
      'category' => 'invites',
      'method' => 'getInviteTargetUsersJobStatus',
      'operationId' => 'get_invite_target_users_job_status',
      'httpMethod' => 'GET',
      'path' => '/invites/{code}/target-users/job-status',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'code',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_or_join_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'createOrJoinLobby',
      'operationId' => 'create_or_join_lobby',
      'httpMethod' => 'PUT',
      'path' => '/lobbies',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'create_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'createLobby',
      'operationId' => 'create_lobby',
      'httpMethod' => 'POST',
      'path' => '/lobbies',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'getLobby',
      'operationId' => 'get_lobby',
      'httpMethod' => 'GET',
      'path' => '/lobbies/{lobby_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'delete_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'deleteLobby',
      'operationId' => 'delete_lobby',
      'httpMethod' => 'DELETE',
      'path' => '/lobbies/{lobby_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'edit_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'editLobby',
      'operationId' => 'edit_lobby',
      'httpMethod' => 'PATCH',
      'path' => '/lobbies/{lobby_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'edit_lobby_channel_link' =>
    array (
      'category' => 'lobbies',
      'method' => 'editLobbyChannelLink',
      'operationId' => 'edit_lobby_channel_link',
      'httpMethod' => 'PATCH',
      'path' => '/lobbies/{lobby_id}/channel-linking',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'leave_lobby' =>
    array (
      'category' => 'lobbies',
      'method' => 'leaveLobby',
      'operationId' => 'leave_lobby',
      'httpMethod' => 'DELETE',
      'path' => '/lobbies/{lobby_id}/members/@me',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_linked_lobby_guild_invite_for_self' =>
    array (
      'category' => 'lobbies',
      'method' => 'createLinkedLobbyGuildInviteForSelf',
      'operationId' => 'create_linked_lobby_guild_invite_for_self',
      'httpMethod' => 'POST',
      'path' => '/lobbies/{lobby_id}/members/@me/invites',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'bulk_update_lobby_members' =>
    array (
      'category' => 'lobbies',
      'method' => 'bulkUpdateLobbyMembers',
      'operationId' => 'bulk_update_lobby_members',
      'httpMethod' => 'POST',
      'path' => '/lobbies/{lobby_id}/members/bulk',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'add_lobby_member' =>
    array (
      'category' => 'lobbies',
      'method' => 'addLobbyMember',
      'operationId' => 'add_lobby_member',
      'httpMethod' => 'PUT',
      'path' => '/lobbies/{lobby_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_lobby_member' =>
    array (
      'category' => 'lobbies',
      'method' => 'deleteLobbyMember',
      'operationId' => 'delete_lobby_member',
      'httpMethod' => 'DELETE',
      'path' => '/lobbies/{lobby_id}/members/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_linked_lobby_guild_invite_for_user' =>
    array (
      'category' => 'lobbies',
      'method' => 'createLinkedLobbyGuildInviteForUser',
      'operationId' => 'create_linked_lobby_guild_invite_for_user',
      'httpMethod' => 'POST',
      'path' => '/lobbies/{lobby_id}/members/{user_id}/invites',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_lobby_messages' =>
    array (
      'category' => 'lobbies',
      'method' => 'getLobbyMessages',
      'operationId' => 'get_lobby_messages',
      'httpMethod' => 'GET',
      'path' => '/lobbies/{lobby_id}/messages',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_lobby_message' =>
    array (
      'category' => 'lobbies',
      'method' => 'createLobbyMessage',
      'operationId' => 'create_lobby_message',
      'httpMethod' => 'POST',
      'path' => '/lobbies/{lobby_id}/messages',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        201 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
      ),
    ),
    'update_lobby_message_external_moderation_metadata' =>
    array (
      'category' => 'lobbies',
      'method' => 'updateLobbyMessageExternalModerationMetadata',
      'operationId' => 'update_lobby_message_external_moderation_metadata',
      'httpMethod' => 'PUT',
      'path' => '/lobbies/{lobby_id}/messages/{message_id}/moderation-metadata',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'lobby_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
      ),
    ),
    'get_my_oauth2_authorization' =>
    array (
      'category' => 'oauth2',
      'method' => 'getMyOauth2Authorization',
      'operationId' => 'get_my_oauth2_authorization',
      'httpMethod' => 'GET',
      'path' => '/oauth2/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'activities.invites.write',
            1 => 'activities.read',
            2 => 'activities.write',
            3 => 'applications.builds.read',
            4 => 'applications.builds.upload',
            5 => 'applications.commands',
            6 => 'applications.commands.permissions.update',
            7 => 'applications.commands.update',
            8 => 'applications.entitlements',
            9 => 'applications.store.update',
            10 => 'bot',
            11 => 'connections',
            12 => 'dm_channels.read',
            13 => 'email',
            14 => 'gdm.join',
            15 => 'guilds',
            16 => 'guilds.join',
            17 => 'guilds.members.read',
            18 => 'identify',
            19 => 'messages.read',
            20 => 'openid',
            21 => 'relationships.read',
            22 => 'role_connections.write',
            23 => 'rpc',
            24 => 'rpc.activities.write',
            25 => 'rpc.notifications.read',
            26 => 'rpc.screenshare.read',
            27 => 'rpc.screenshare.write',
            28 => 'rpc.video.read',
            29 => 'rpc.video.write',
            30 => 'rpc.voice.read',
            31 => 'rpc.voice.write',
            32 => 'voice',
            33 => 'webhook.incoming',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_my_oauth2_application' =>
    array (
      'category' => 'oauth2',
      'method' => 'getMyOauth2Application',
      'operationId' => 'get_my_oauth2_application',
      'httpMethod' => 'GET',
      'path' => '/oauth2/applications/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_public_keys' =>
    array (
      'category' => 'oauth2',
      'method' => 'getPublicKeys',
      'operationId' => 'get_public_keys',
      'httpMethod' => 'GET',
      'path' => '/oauth2/keys',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_openid_connect_userinfo' =>
    array (
      'category' => 'oauth2',
      'method' => 'getOpenidConnectUserinfo',
      'operationId' => 'get_openid_connect_userinfo',
      'httpMethod' => 'GET',
      'path' => '/oauth2/userinfo',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'openid',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_user_message_external_moderation_metadata' =>
    array (
      'category' => 'partnerSdk',
      'method' => 'updateUserMessageExternalModerationMetadata',
      'operationId' => 'update_user_message_external_moderation_metadata',
      'httpMethod' => 'PUT',
      'path' => '/partner-sdk/dms/{user_id_1}/{user_id_2}/messages/{message_id}/moderation-metadata',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'user_id_1',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'user_id_2',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
      ),
    ),
    'partner_sdk_unmerge_provisional_account' =>
    array (
      'category' => 'partnerSdk',
      'method' => 'partnerSdkUnmergeProvisionalAccount',
      'operationId' => 'partner_sdk_unmerge_provisional_account',
      'httpMethod' => 'POST',
      'path' => '/partner-sdk/provisional-accounts/unmerge',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'bot_partner_sdk_unmerge_provisional_account' =>
    array (
      'category' => 'partnerSdk',
      'method' => 'botPartnerSdkUnmergeProvisionalAccount',
      'operationId' => 'bot_partner_sdk_unmerge_provisional_account',
      'httpMethod' => 'POST',
      'path' => '/partner-sdk/provisional-accounts/unmerge/bot',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'partner_sdk_token' =>
    array (
      'category' => 'partnerSdk',
      'method' => 'partnerSdkToken',
      'operationId' => 'partner_sdk_token',
      'httpMethod' => 'POST',
      'path' => '/partner-sdk/token',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'bot_partner_sdk_token' =>
    array (
      'category' => 'partnerSdk',
      'method' => 'botPartnerSdkToken',
      'operationId' => 'bot_partner_sdk_token',
      'httpMethod' => 'POST',
      'path' => '/partner-sdk/token/bot',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_sku_subscriptions' =>
    array (
      'category' => 'skus',
      'method' => 'getSkuSubscriptions',
      'operationId' => 'get_sku_subscriptions',
      'httpMethod' => 'GET',
      'path' => '/skus/{sku_id}/subscriptions',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'sku_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'user_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'activities.invites.write',
            1 => 'activities.read',
            2 => 'activities.write',
            3 => 'applications.builds.read',
            4 => 'applications.builds.upload',
            5 => 'applications.commands',
            6 => 'applications.commands.permissions.update',
            7 => 'applications.commands.update',
            8 => 'applications.entitlements',
            9 => 'applications.store.update',
            10 => 'bot',
            11 => 'connections',
            12 => 'dm_channels.read',
            13 => 'email',
            14 => 'gdm.join',
            15 => 'guilds',
            16 => 'guilds.join',
            17 => 'guilds.members.read',
            18 => 'identify',
            19 => 'messages.read',
            20 => 'openid',
            21 => 'relationships.read',
            22 => 'role_connections.write',
            23 => 'rpc',
            24 => 'rpc.activities.write',
            25 => 'rpc.notifications.read',
            26 => 'rpc.screenshare.read',
            27 => 'rpc.screenshare.write',
            28 => 'rpc.video.read',
            29 => 'rpc.video.write',
            30 => 'rpc.voice.read',
            31 => 'rpc.voice.write',
            32 => 'voice',
            33 => 'webhook.incoming',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_sku_subscription' =>
    array (
      'category' => 'skus',
      'method' => 'getSkuSubscription',
      'operationId' => 'get_sku_subscription',
      'httpMethod' => 'GET',
      'path' => '/skus/{sku_id}/subscriptions/{subscription_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'sku_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'subscription_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'user_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'activities.invites.write',
            1 => 'activities.read',
            2 => 'activities.write',
            3 => 'applications.builds.read',
            4 => 'applications.builds.upload',
            5 => 'applications.commands',
            6 => 'applications.commands.permissions.update',
            7 => 'applications.commands.update',
            8 => 'applications.entitlements',
            9 => 'applications.store.update',
            10 => 'bot',
            11 => 'connections',
            12 => 'dm_channels.read',
            13 => 'email',
            14 => 'gdm.join',
            15 => 'guilds',
            16 => 'guilds.join',
            17 => 'guilds.members.read',
            18 => 'identify',
            19 => 'messages.read',
            20 => 'openid',
            21 => 'relationships.read',
            22 => 'role_connections.write',
            23 => 'rpc',
            24 => 'rpc.activities.write',
            25 => 'rpc.notifications.read',
            26 => 'rpc.screenshare.read',
            27 => 'rpc.screenshare.write',
            28 => 'rpc.video.read',
            29 => 'rpc.video.write',
            30 => 'rpc.voice.read',
            31 => 'rpc.voice.write',
            32 => 'voice',
            33 => 'webhook.incoming',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_soundboard_default_sounds' =>
    array (
      'category' => 'soundboardDefaultSounds',
      'method' => 'getSoundboardDefaultSounds',
      'operationId' => 'get_soundboard_default_sounds',
      'httpMethod' => 'GET',
      'path' => '/soundboard-default-sounds',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_stage_instance' =>
    array (
      'category' => 'stageInstances',
      'method' => 'createStageInstance',
      'operationId' => 'create_stage_instance',
      'httpMethod' => 'POST',
      'path' => '/stage-instances',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_stage_instance' =>
    array (
      'category' => 'stageInstances',
      'method' => 'getStageInstance',
      'operationId' => 'get_stage_instance',
      'httpMethod' => 'GET',
      'path' => '/stage-instances/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'delete_stage_instance' =>
    array (
      'category' => 'stageInstances',
      'method' => 'deleteStageInstance',
      'operationId' => 'delete_stage_instance',
      'httpMethod' => 'DELETE',
      'path' => '/stage-instances/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
    ),
    'update_stage_instance' =>
    array (
      'category' => 'stageInstances',
      'method' => 'updateStageInstance',
      'operationId' => 'update_stage_instance',
      'httpMethod' => 'PATCH',
      'path' => '/stage-instances/{channel_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'channel_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'channel_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_sticker_packs' =>
    array (
      'category' => 'stickerPacks',
      'method' => 'listStickerPacks',
      'operationId' => 'list_sticker_packs',
      'httpMethod' => 'GET',
      'path' => '/sticker-packs',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_sticker_pack' =>
    array (
      'category' => 'stickerPacks',
      'method' => 'getStickerPack',
      'operationId' => 'get_sticker_pack',
      'httpMethod' => 'GET',
      'path' => '/sticker-packs/{pack_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'pack_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_sticker' =>
    array (
      'category' => 'stickers',
      'method' => 'getSticker',
      'operationId' => 'get_sticker',
      'httpMethod' => 'GET',
      'path' => '/stickers/{sticker_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'sticker_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_my_user' =>
    array (
      'category' => 'users',
      'method' => 'getMyUser',
      'operationId' => 'get_my_user',
      'httpMethod' => 'GET',
      'path' => '/users/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'identify',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_my_user' =>
    array (
      'category' => 'users',
      'method' => 'updateMyUser',
      'operationId' => 'update_my_user',
      'httpMethod' => 'PATCH',
      'path' => '/users/@me',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_current_user_application_entitlements' =>
    array (
      'category' => 'users',
      'method' => 'getCurrentUserApplicationEntitlements',
      'operationId' => 'get_current_user_application_entitlements',
      'httpMethod' => 'GET',
      'path' => '/users/@me/applications/{application_id}/entitlements',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'sku_ids',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'exclude_consumed',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'OAuth2' =>
          array (
            0 => 'activities.invites.write',
            1 => 'activities.read',
            2 => 'activities.write',
            3 => 'applications.builds.read',
            4 => 'applications.builds.upload',
            5 => 'applications.commands',
            6 => 'applications.commands.permissions.update',
            7 => 'applications.commands.update',
            8 => 'applications.entitlements',
            9 => 'applications.store.update',
            10 => 'bot',
            11 => 'connections',
            12 => 'dm_channels.read',
            13 => 'email',
            14 => 'gdm.join',
            15 => 'guilds',
            16 => 'guilds.join',
            17 => 'guilds.members.read',
            18 => 'identify',
            19 => 'messages.read',
            20 => 'openid',
            21 => 'relationships.read',
            22 => 'role_connections.write',
            23 => 'rpc',
            24 => 'rpc.activities.write',
            25 => 'rpc.notifications.read',
            26 => 'rpc.screenshare.read',
            27 => 'rpc.screenshare.write',
            28 => 'rpc.video.read',
            29 => 'rpc.video.write',
            30 => 'rpc.voice.read',
            31 => 'rpc.voice.write',
            32 => 'voice',
            33 => 'webhook.incoming',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_application_user_role_connection' =>
    array (
      'category' => 'users',
      'method' => 'getApplicationUserRoleConnection',
      'operationId' => 'get_application_user_role_connection',
      'httpMethod' => 'GET',
      'path' => '/users/@me/applications/{application_id}/role-connection',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'OAuth2' =>
          array (
            0 => 'role_connections.write',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'update_application_user_role_connection' =>
    array (
      'category' => 'users',
      'method' => 'updateApplicationUserRoleConnection',
      'operationId' => 'update_application_user_role_connection',
      'httpMethod' => 'PUT',
      'path' => '/users/@me/applications/{application_id}/role-connection',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'OAuth2' =>
          array (
            0 => 'role_connections.write',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'delete_application_user_role_connection' =>
    array (
      'category' => 'users',
      'method' => 'deleteApplicationUserRoleConnection',
      'operationId' => 'delete_application_user_role_connection',
      'httpMethod' => 'DELETE',
      'path' => '/users/@me/applications/{application_id}/role-connection',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'application_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'OAuth2' =>
          array (
            0 => 'role_connections.write',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'create_dm' =>
    array (
      'category' => 'users',
      'method' => 'createDm',
      'operationId' => 'create_dm',
      'httpMethod' => 'POST',
      'path' => '/users/@me/channels',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'list_my_connections' =>
    array (
      'category' => 'users',
      'method' => 'listMyConnections',
      'operationId' => 'list_my_connections',
      'httpMethod' => 'GET',
      'path' => '/users/@me/connections',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'connections',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'list_my_guilds' =>
    array (
      'category' => 'users',
      'method' => 'listMyGuilds',
      'operationId' => 'list_my_guilds',
      'httpMethod' => 'GET',
      'path' => '/users/@me/guilds',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'before',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        1 =>
        array (
          'name' => 'after',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        2 =>
        array (
          'name' => 'limit',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'with_counts',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
        1 =>
        array (
          'OAuth2' =>
          array (
            0 => 'guilds',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'leave_guild' =>
    array (
      'category' => 'users',
      'method' => 'leaveGuild',
      'operationId' => 'leave_guild',
      'httpMethod' => 'DELETE',
      'path' => '/users/@me/guilds/{guild_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_my_guild_member' =>
    array (
      'category' => 'users',
      'method' => 'getMyGuildMember',
      'operationId' => 'get_my_guild_member',
      'httpMethod' => 'GET',
      'path' => '/users/@me/guilds/{guild_id}/member',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'guild_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'OAuth2' =>
          array (
            0 => 'guilds.members.read',
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'guild_id',
      ),
    ),
    'get_user' =>
    array (
      'category' => 'users',
      'method' => 'getUser',
      'operationId' => 'get_user',
      'httpMethod' => 'GET',
      'path' => '/users/{user_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'user_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'list_voice_regions' =>
    array (
      'category' => 'voice',
      'method' => 'listVoiceRegions',
      'operationId' => 'list_voice_regions',
      'httpMethod' => 'GET',
      'path' => '/voice/regions',
      'parameters' =>
      array (
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
      ),
    ),
    'get_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'getWebhook',
      'operationId' => 'get_webhook',
      'httpMethod' => 'GET',
      'path' => '/webhooks/{webhook_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
      ),
    ),
    'delete_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'deleteWebhook',
      'operationId' => 'delete_webhook',
      'httpMethod' => 'DELETE',
      'path' => '/webhooks/{webhook_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
      ),
    ),
    'update_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'updateWebhook',
      'operationId' => 'update_webhook',
      'httpMethod' => 'PATCH',
      'path' => '/webhooks/{webhook_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'audit_log_reason',
          'location' => 'header',
          'required' => false,
          'style' => 'simple',
          'explode' => false,
          'wireName' => 'X-Audit-Log-Reason',
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_webhook_by_token' =>
    array (
      'category' => 'webhooks',
      'method' => 'getWebhookByToken',
      'operationId' => 'get_webhook_by_token',
      'httpMethod' => 'GET',
      'path' => '/webhooks/{webhook_id}/{webhook_token}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'execute_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'executeWebhook',
      'operationId' => 'execute_webhook',
      'httpMethod' => 'POST',
      'path' => '/webhooks/{webhook_id}/{webhook_token}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'wait',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'with_components',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'delete_webhook_by_token' =>
    array (
      'category' => 'webhooks',
      'method' => 'deleteWebhookByToken',
      'operationId' => 'delete_webhook_by_token',
      'httpMethod' => 'DELETE',
      'path' => '/webhooks/{webhook_id}/{webhook_token}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'update_webhook_by_token' =>
    array (
      'category' => 'webhooks',
      'method' => 'updateWebhookByToken',
      'operationId' => 'update_webhook_by_token',
      'httpMethod' => 'PATCH',
      'path' => '/webhooks/{webhook_id}/{webhook_token}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'execute_github_compatible_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'executeGithubCompatibleWebhook',
      'operationId' => 'execute_github_compatible_webhook',
      'httpMethod' => 'POST',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/github',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'wait',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
        ),
      ),
    ),
    'get_original_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'getOriginalWebhookMessage',
      'operationId' => 'get_original_webhook_message',
      'httpMethod' => 'GET',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/@original',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'delete_original_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'deleteOriginalWebhookMessage',
      'operationId' => 'delete_original_webhook_message',
      'httpMethod' => 'DELETE',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/@original',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'update_original_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'updateOriginalWebhookMessage',
      'operationId' => 'update_original_webhook_message',
      'httpMethod' => 'PATCH',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/@original',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'with_components',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'get_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'getWebhookMessage',
      'operationId' => 'get_webhook_message',
      'httpMethod' => 'GET',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'delete_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'deleteWebhookMessage',
      'operationId' => 'delete_webhook_message',
      'httpMethod' => 'DELETE',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        204 => 'empty',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
    ),
    'update_webhook_message' =>
    array (
      'category' => 'webhooks',
      'method' => 'updateWebhookMessage',
      'operationId' => 'update_webhook_message',
      'httpMethod' => 'PATCH',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/messages/{message_id}',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'message_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        4 =>
        array (
          'name' => 'with_components',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
        'binaryFields' =>
        array (
          0 => 'files[0]',
          1 => 'files[1]',
          2 => 'files[2]',
          3 => 'files[3]',
          4 => 'files[4]',
          5 => 'files[5]',
          6 => 'files[6]',
          7 => 'files[7]',
          8 => 'files[8]',
          9 => 'files[9]',
        ),
        'payloadJson' => true,
      ),
    ),
    'execute_slack_compatible_webhook' =>
    array (
      'category' => 'webhooks',
      'method' => 'executeSlackCompatibleWebhook',
      'operationId' => 'execute_slack_compatible_webhook',
      'httpMethod' => 'POST',
      'path' => '/webhooks/{webhook_id}/{webhook_token}/slack',
      'parameters' =>
      array (
        0 =>
        array (
          'name' => 'webhook_id',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        1 =>
        array (
          'name' => 'webhook_token',
          'location' => 'path',
          'required' => true,
          'style' => 'simple',
          'explode' => false,
        ),
        2 =>
        array (
          'name' => 'wait',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
        3 =>
        array (
          'name' => 'thread_id',
          'location' => 'query',
          'required' => false,
          'style' => 'form',
          'explode' => true,
        ),
      ),
      'responses' =>
      array (
        200 => 'json',
      ),
      'security' =>
      array (
        0 =>
        array (
        ),
        1 =>
        array (
          'BotToken' =>
          array (
          ),
        ),
      ),
      'interactionRoute' => false,
      'majorParameters' =>
      array (
        0 => 'webhook_id',
        1 => 'webhook_token',
      ),
      'requestBody' =>
      array (
        'required' => true,
        'mediaTypes' =>
        array (
          0 => 'application/json',
          1 => 'application/x-www-form-urlencoded',
          2 => 'multipart/form-data',
        ),
      ),
    ),
  ),
);
