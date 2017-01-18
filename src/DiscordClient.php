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
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Monolog\Logger;
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
     * Client constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $this->validateOptions($options);

        $stack = HandlerStack::create();
        $stack->push(
            Middleware::log(
                new Logger('Logger'),
                new MessageFormatter('{response}')
            )
        );
        $stack->push(
            Middleware::log(
                new Logger('Logger'),
                new MessageFormatter('{method} {uri} - {request}')
            )
        );
        $client = new Client(
            [
                'headers' => [
                    'Authorization'  => 'Bot '.$this->options['token'],
                    'User-Agent'     => "DiscordBot (https://github.com/aequasi/php-restcord, {$this->options['version']})",
                ],
                'handler' => $stack,
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
    public function __get(string $name): GuzzleClient
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
            'baseUri' => $description['baseUri'],
            'version' => $description['version'],
        ];
        foreach ($description['operations'] as $category => $operations) {
            $this->categories[$category] = new GuzzleClient(
                $client,
                new Description(array_merge($base, ['operations' => $this->prepareOperations($operations)]))
            );
        }
    }

    /**
     * @param array $options
     *
     * @return array
     */
    private function validateOptions(array $options): array
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(
            [
                'version' => '1.0.0',
            ]
        );

        $resolver->setRequired('token');
        $resolver->setAllowedTypes('token', ['string']);
        $resolver->setAllowedTypes('version', ['string']);

        return $resolver->resolve($options);
    }

    private function prepareOperations(array $operations): array
    {
        foreach ($operations as $operation => &$config) {
            $config['uri'] = ltrim($config['url'], '/');
            unset($config['url']);

            $config['httpMethod'] = strtoupper($config['method']);
            unset($config['method']);

            foreach ($config['parameters'] as $parameter => &$parameterConfig) {
                if ($parameterConfig['type'] === 'snowflake') {
                    $parameterConfig['type'] = 'integer';
                }
            }
        }

        return $operations;
    }
}
