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
 * Audit-log Intellisense Helper
 */
interface Audit-log {

	/**
	 * @see https://discordapp.com/developers/docs/resources/audit-log#get-guild-audit-log
	 * 
	 * @param array $options ['guild.id' => 'snowflake']
	 * @return \RestCord\Model\AuditLog\AuditLog Returns an audit log object for the guild.
	 */
	public function GetGuildAuditLog(array $options);
}