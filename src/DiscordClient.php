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
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Result;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Monolog\Logger;
use Psr\Http\Message\ResponseInterface;
use RestCord\Logging\MessageFormatter;
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
class DiscordClient
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var GuzzleClient[]
     */
    private $categories = [];

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

        $defaultGuzzleOptions           = [
            'base_uri'    => $this->options['apiUrl'],
            'headers'     => [
                'Authorization' => $this->getAuthorizationHeader($this->options['tokenType'], $this->options['token']),
                'User-Agent'    => "DiscordBot (https://github.com/aequasi/php-restcord, {$this->getVersion()})",
                'Content-Type'  => 'application/json',
            ],
            'http_errors' => false,
            'handler'     => $stack,
        ];
        $this->options['guzzleOptions'] = array_merge($this->options['guzzleOptions'], $defaultGuzzleOptions);

        $client = new Client($this->options['guzzleOptions']);

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
                'apiUrl'           => "https://discordapp.com/api/v{$currentVersion}/",
                'tokenType'        => 'None',
                'cacheDir'         => __DIR__.'/../../../cache/',
                'guzzleOptions'    => [],
            ]
        )
            ->setDefined(['token'])
            ->setAllowedValues('tokenType', ['Bot', 'User', 'OAuth', 'None'])
            ->setAllowedTypes('token', ['string'])
            ->setAllowedTypes('apiUrl', ['string'])
            ->setAllowedTypes('throwOnRatelimit', ['bool'])
            ->setAllowedTypes('logger', ['\Psr\Log\LoggerInterface'])
            ->setAllowedTypes('version', ['string', 'integer'])
            ->setAllowedTypes('guzzleOptions', ['array'])
            ->setNormalizer(
                'token',
                function (Options $options, $value) {
                    if (0 === stripos($value, 'Bot ')) {
                        $value                = substr($value, 4);
                        $options['tokenType'] = 'Bot';
                    }
                    if (0 === stripos($value, 'Bearer ')) {
                        $value                = substr($value, 7);
                        $options['tokenType'] = 'OAuth';
                    }

                    if (empty($value)) {
                        $options['tokenType'] = 'None';
                    }

                    return $value;
                }
            )
            ->setNormalizer(
                'tokenType',
                function (Options $options, $value) {
                    if ($options['token'] !== null && $value === 'None') {
                        $value = 'Bot';
                    }

                    if ($value !== 'User') {
                        $value .= ' ';
                    } else {
                        $value = '';
                    }

                    return $value;
                }
            );

        return $resolver->resolve($options);
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
            'models'  => $this->prepareModels($description['models']),
        ];
        foreach ($description['operations'] as $category => $operations) {
            $this->categories[$category] = new OverriddenGuzzleClient(
                $client,
                new Description(array_merge($base, ['operations' => $this->prepareOperations($operations)])),
                function ($res, $req, $com) use ($category, $description) {
                    return $this->convertResponseToResult($category, $description, $res, $com);
                },
                $category
            );
        }
    }

    /**
     * @param string            $category
     * @param array             $description
     * @param ResponseInterface $response
     * @param CommandInterface  $command
     *
     * @throws \Exception
     *
     * @return Result|mixed
     *
     * @internal param RequestInterface $request
     */
    private function convertResponseToResult(
        $category,
        array $description,
        ResponseInterface $response,
        CommandInterface $command
    ) {
        if ($response->getStatusCode() >= 400) {
            throw new \Exception($response->getBody()->__toString(), $response->getStatusCode());
        }

        $operation = $description['operations'][$category][$command->getName()];
        if (!isset($operation['responseTypes']) || count($operation['responseTypes']) === 0) {
            try {
                $content = $response->getBody()->__toString();
                if (empty($content)) {
                    $content = '{}';
                }

                return new Result(json_decode($content, true));
            } catch (\Exception $e) {
                dump($response->getBody()->__toString());
                throw $e;
            }
        }

        $data      = json_decode($response->getBody()->__toString());
        $firstType = $this->dashesToCamelCase($operation['responseTypes'][0]['type'], true);
        $class     = $this->mapBadDocs(
            sprintf(
                '\\RestCord\\Model\\%s\\%s',
                ucwords($category),
                ucwords(explode('/', $firstType)[1])
            )
        );

        if (!class_exists($class)) {
            return new Result($data);
        }

        $mapper                   = new \JsonMapper();
        $mapper->bStrictNullTypes = false;

        return $mapper->map($data, new $class());
    }

    private function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }

        return $str;
    }

    private function mapBadDocs($cls)
    {
        switch ($cls) {
            case '\RestCord\Model\User\DmChannel':
                $cls = '\RestCord\Model\Channel\DmChannel';
                break;
            case '\RestCord\Model\Channel\Invite':
            case '\RestCord\Model\Guild\Invite':
                $cls = '\RestCord\Model\Invite\Invite';
                break;
            case '\RestCord\Model\Guild\GuildChannel':
                $cls = '\RestCord\Model\Channel\GuildChannel';
                break;
            case '\RestCord\Model\Guild\User':
            case '\RestCord\Model\Channel\User':
                $cls = '\RestCord\Model\User\User';
                break;
            default:
                return $cls;
        }

        return $cls;
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

            if (isset($config['responseTypes']) && count($config['responseTypes']) === 1) {
                $class = ucwords($config['category']).'\\';
                $class .= str_replace(' ', '', ucwords($config['responseTypes'][0]['name']));

                $config['responseModel'] = $class;
            } else {
                $config['responseModel'] = 'getResponse';
            }

            if (isset($config['parametersArray']) && $config['parametersArray']) {
                $config['type'] = 'array';
            }
            unset($config['parametersArray']);

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
        return trim(file_get_contents(__DIR__.'/../VERSION'));
    }

    /**
     * @param array $toParse
     *
     * @return array|mixed
     */
    private function prepareModels(array $toParse)
    {
        $models = [
            'getResponse' => [
                'type'                 => 'object',
                'additionalProperties' => [
                    'location' => 'json',
                ],
            ],
        ];

        foreach ($toParse as $category => $m) {
            foreach ($m as $name => $model) {
                $class          = ucwords($category).'\\'.ucwords($name);
                $models[$class] = [
                    'type'                 => 'object',
                    'properties'           => [],
                    'additionalProperties' => [
                        'location' => 'json',
                    ],
                ];

                foreach ($model['properties'] as $n => $property) {
                    if ($property['type'] !== 'array' && $property['type'] !== 'object') {
                        $models[$class]['properties'][$n] = [
                            'type'     => $property['type'],
                            'location' => 'json',
                        ];
                    }
                }
            }
        }

        // Maps!
        $models['Guild\\Channel'] = $models['Channel\\GuildChannel'];

        return $models;
    }

    /**
     * @param string $tokenType
     * @param string $token
     *
     * @return string
     */
    private function getAuthorizationHeader($tokenType, $token)
    {
        switch ($tokenType) {
            default:
                $authorization = 'Bot ';
                break;
            case 'User':
                $authorization = '';
                break;
            case 'OAuth':
                $authorization = 'Bearer ';
        }

        return $authorization.$token;
    }
}
