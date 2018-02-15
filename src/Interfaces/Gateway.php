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
 * Gateway Intellisense Helper
 */
interface Gateway {

	/**
	 * @see https://discordapp.com/developers/docs/topics/gateway#get-gateway
	 *
	 * @param array $options []
	 * @return array
	 */
	public function getGateway(array $options);

	/**
	 * @see https://discordapp.com/developers/docs/topics/gateway#get-gateway-bot
	 *
	 * @param array $options []
	 * @return array
	 */
	public function getGatewayBot(array $options);
}