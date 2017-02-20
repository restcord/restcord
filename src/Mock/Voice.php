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
 * Voice Intellisense Helper.
 */
interface Voice
{
    /**
     * @param array $options []
     *
     * @return array Returns an array of voice region objects that can be used when creating servers.
     */
    public function listVoiceRegions(array $options);
}
