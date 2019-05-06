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
 * Invite Intellisense Helper
 */
interface Invite {

	/**
	 * @see https://discordapp.com/developers/docs/resources/invite#delete-invite
	 *
	 * @param array $options ['invite.code' => 'string']
	 * @return \RestCord\Model\Invite\Invite Returns an invite object on success.
	 */
	public function deleteInvite(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/invite#get-invite
	 *
	 * @param array $options ['invite.code' => 'string']
	 * @return \RestCord\Model\Invite\Invite Returns an invite object for the given code.
	 */
	public function getInvite(array $options);
}