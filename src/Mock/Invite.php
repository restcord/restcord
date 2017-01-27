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
 * Invite Intellisense Helper.
 */
interface Invite
{
    /**
     * @param array $options ['invite.code' => 'string']
     *
     * @return array Returns an invite object on success.
     */
    public function acceptInvite(array $options);

    /**
     * @param array $options ['invite.code' => 'string']
     *
     * @return array Returns an invite object on success.
     */
    public function deleteInvite(array $options);

    /**
     * @param array $options ['invite.code' => 'string']
     *
     * @return array Returns an invite object for the given code.
     */
    public function getInvite(array $options);
}
