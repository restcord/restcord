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
 * AuditLog Intellisense Helper
 */
interface AuditLog {

	/**
	 * @see https://discordapp.com/developers/docs/resources/audit-log#get-guild-audit-log
	 *
	 * @param array $options ['guild.id' => 'snowflake', 'user_id' => 'snowflake', 'action_type' => 'integer', 'before' => 'snowflake', 'limit' => 'integer']
	 * @return array
	 */
	public function getGuildAuditLog(array $options);
}