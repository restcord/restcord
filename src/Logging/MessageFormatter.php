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

namespace RestCord\Logging;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * MessageFormatter Class
 */
class MessageFormatter extends \GuzzleHttp\MessageFormatter
{
    /**
     * @var
     */
    private $token;

    /**
     * MessageFormatter constructor.
     *
     * @param string $template
     * @param        $token
     */
    public function __construct($template, $token)
    {
        \GuzzleHttp\MessageFormatter::__construct($template);
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function format(
        RequestInterface $request,
        ResponseInterface $response = null,
        \Exception $error = null
    ) {
        $template = parent::format($request, $response, $error);

        return str_replace($this->token, '<TOKEN>', $template);
    }
}
