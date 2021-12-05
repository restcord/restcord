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
 * StageInstance Intellisense Helper
 */
interface StageInstance {

	/**
	 * @see https://discordapp.com/developers/docs/resources/stage-instance#create-stage-instance
	 *
	 * @param array $options ['channel_id' => 'snowflake', 'topic' => 'string', 'privacy_level' => 'integer']
	 * @return array
	 */
	public function createStageInstance(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/stage-instance#delete-stage-instance
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function deleteStageInstance(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/stage-instance#get-stage-instance
	 *
	 * @param array $options ['channel.id' => 'snowflake']
	 * @return array
	 */
	public function getStageInstance(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/resources/stage-instance#modify-stage-instance
	 *
	 * @param array $options ['channel.id' => 'snowflake', 'topic' => 'string', 'privacy_level' => 'integer']
	 * @return array
	 */
	public function modifyStageInstance(array $options);
}