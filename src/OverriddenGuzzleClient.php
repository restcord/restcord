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

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\DescriptionInterface;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Result;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Monolog\Logger;
use Psr\Http\Message\ResponseInterface;
use RestCord\Logging\MessageFormatter;
use RestCord\Override\OverrideInterface;
use RestCord\RateLimit\RateLimiter;
use RestCord\RateLimit\RateLimitProvider;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function GuzzleHttp\json_decode;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * Client Class
 *
 * @property Interfaces\Channel channel
 * @property Interfaces\Gateway gateway
 * @property Interfaces\Guild   guild
 * @property Interfaces\Invite  invite
 * @property Interfaces\Oauth2  oauth2
 * @property Interfaces\User    user
 * @property Interfaces\Voice   voice
 * @property Interfaces\Webhook webhook
 */
class OverriddenGuzzleClient extends GuzzleClient
{
    /**
     * @var callable
     */
    private $category;

    /**
     * @var callable|null
     */
    private $responseToResultTransformer;

    /**
     * OverriddenGuzzleClient constructor.
     *
     * @param ClientInterface      $client
     * @param DescriptionInterface $description
     * @param callable|null        $responseToResultTransformer
     * @param callable             $category
     */
    public function __construct(
        ClientInterface $client,
        DescriptionInterface $description,
        callable $responseToResultTransformer = null,
        $category
    ) {
        parent::__construct($client, $description, null, $responseToResultTransformer);

        $this->category                    = $category;
        $this->responseToResultTransformer = $responseToResultTransformer;
    }

    public function __call($name, array $args)
    {
        /** @var OverrideInterface $cls */
        $cls = 'RestCord\\Override\\'.ucwords($this->category).'\\'.ucfirst($name);
        if (class_exists($cls)) {
            $result = $cls::run($this, isset($args[0]) ? $args[0] : [], substr($name, -5) === 'Async');
            $transform = $this->responseToResultTransformer;
            if ($result->getReasonPhrase() !== 'NO CONTENT') {
                return $transform(
                    $result,
                    null,
                    new Command($name)
                );
            }

            return $result;
        }

        return parent::__call($name, $args);
    }
}
