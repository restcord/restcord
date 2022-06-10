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

namespace RestCord;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * Constants Class
 */
class Constants
{
    const CDN_URL    = 'https://cdn.discordapp.com/';
    const BANNER_URL = self::CDN_URL.'banners/';
    const SERVER_URL = self::CDN_URL.'icons/';
    const AVATAR_URL         = self::CDN_URL.'avatars/';
    const DEFAULT_AVATAR_URL = self::CDN_URL.'embed/avatars/';
    const GUILD_ICON_URL     = self::CDN_URL.'icons/';
    const GUILD_SPLASH_URL   = self::CDN_URL.'splashes/';
}
