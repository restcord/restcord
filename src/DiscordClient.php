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
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Monolog\Logger;
use RestCord\Logging\MessageFormatter;
use RestCord\RateLimit\RateLimiter;
use RestCord\RateLimit\RateLimitProvider;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * Client Class
 */
class DiscordClient
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var GuzzleClient[]
     */
    public $categories = [];

    /**
     * @var Logger
     */
    private $logger;

    /**
     * Client constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $this->validateOptions($options);
        $this->logger  = $this->options['logger'];

        $stack = HandlerStack::create();
        $stack->push(
            new RateLimiter(
                new RateLimitProvider(),
                $this->options,
                $this->logger
            )
        );
        $stack->push(
            Middleware::log(
                $this->logger,
                new MessageFormatter('{response}', $this->options['token'])
            )
        );
        $stack->push(
            Middleware::log(
                $this->logger,
                new MessageFormatter('{url} {request}', $this->options['token'])
            )
        );
        $client = new Client(
            [
                'headers'     => [
                    'Authorization' => 'Bot '.$this->options['token'],
                    'User-Agent'    => "DiscordBot (https://github.com/aequasi/php-restcord, {$this->getVersion()})",
                ],
                'http_errors' => false,
                'handler'     => $stack,
            ]
        );

        $this->buildDescriptions($client);
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return GuzzleClient
     */
    public function __get($name)
    {
        if (!isset($this->categories[$name])) {
            throw new \Exception('No category with the name: '.$name);
        }

        return $this->categories[$name];
    }

    /**
     * @param Client $client
     */
    private function buildDescriptions(Client $client)
    {
        $description = \GuzzleHttp\json_decode(
            file_get_contents(__DIR__.'/Resources/service_description-v'.$this->options['version'].'.json'),
            true
        );

        $base = [
            'baseUri' => $this->options['apiUrl'],
            'version' => $description['version'],
            'models'  => [
                'getResponse' => [
                    'type'                 => 'object',
                    'additionalProperties' => [
                        'location' => 'json',
                    ],
                ],
            ],
        ];
        foreach ($description['operations'] as $category => $operations) {
            $this->categories[$category] = new GuzzleClient(
                $client,
                new Description(
                    array_merge($base, ['operations' => $this->prepareOperations($operations)])
                )
            );
        }
    }

    /**
     * @param array $options
     *
     * @return array
     */
    private function validateOptions(array $options)
    {
        $currentVersion = 6;
        $resolver       = new OptionsResolver();
        $resolver->setDefaults(
            [
                'version'          => $currentVersion,
                'logger'           => new Logger('Logger'),
                'throwOnRatelimit' => false,
                'apiUrl'           => 'https://discordapp.com/api/v'.$currentVersion,
            ]
        )
            ->setRequired('token')
            ->setAllowedTypes('token', ['string'])
            ->setAllowedTypes('apiUrl', ['string'])
            ->setAllowedTypes('throwOnRatelimit', ['bool'])
            ->setAllowedTypes('logger', ['\Monolog\Logger'])
            ->setAllowedTypes('version', ['string', 'integer']);

        return $resolver->resolve($options);
    }

    /**
     * @param array $operations
     *
     * @return array
     */
    private function prepareOperations(array $operations)
    {
        foreach ($operations as $operation => &$config) {
            $config['uri'] = ltrim($config['url'], '/');
            unset($config['url']);

            $config['httpMethod'] = strtoupper($config['method']);
            unset($config['method']);

            $config['responseModel'] = 'getResponse';

            foreach ($config['parameters'] as $parameter => &$parameterConfig) {
                $this->updateParameterTypes($parameterConfig);
                if (!isset($parameterConfig['required'])) {
                    $parameterConfig['required'] = false;
                }
            }
        }

        return $operations;
    }

    /**
     * @param array $parameterConfig
     */
    private function updateParameterTypes(array &$parameterConfig)
    {
        if ($parameterConfig['type'] === 'snowflake') {
            $parameterConfig['type'] = 'integer';
        }

        if ($parameterConfig['type'] === 'bool') {
            $parameterConfig['type'] = 'boolean';
        }

        if ($parameterConfig['type'] === 'file contents') {
            $parameterConfig['type'] = 'string';
        }

        if (stripos($parameterConfig['type'], 'object') !== false) {
            $parameterConfig['type'] = 'array';
        }
    }

    /**
     * @return string
     */
    private function getVersion()
    {
        return file_get_contents(__DIR__.'/../VERSION');
    }
}
