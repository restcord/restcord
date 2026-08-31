<?php

declare(strict_types=1);

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

use Composer\InstalledVersions;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RestCord\RateLimit\Provider\MemoryRateLimitProvider;
use RestCord\RateLimit\Provider\RateLimitProviderInterface;
use RestCord\RateLimit\RateLimiter;

class DiscordClient
{
    private array $categories = [];

    private array $categoryClasses = [];

    private ResourceClient $resourceClient;

    public function __construct(array $options = [])
    {
        $options = $this->validateOptions($options);
        $stack   = HandlerStack::create($options['httpHandler']);
        foreach ($options['middleware'] as $middleware) {
            $stack->push($middleware);
        }
        $stack->unshift(new RateLimiter(
            $options['rateLimitProvider'],
            $options['throwOnRatelimit'],
            $options['globalRateLimit'],
            $options['logger']
        ), 'restcord_rate_limiter');

        $registry             = require __DIR__.'/Resources/operations-v10.php';
        $this->resourceClient = new ResourceClient(
            $registry['operations'],
            new Client([
                ...$options['guzzleOptions'],
                'base_uri'    => 'https://discord.com/api/v10/',
                'headers'     => ['User-Agent' => 'DiscordBot (https://github.com/restcord/restcord, '.$this->version().')'],
                'http_errors' => false,
                'handler'     => $stack,
            ]),
            $options['token'],
            $options['tokenType'],
            $options['logger']
        );

        foreach ($registry['operations'] as $operation) {
            $this->categoryClasses[$operation['category']] = 'RestCord\\Generated\\'.ucfirst($operation['category']).'Api';
        }
    }

    public function __get(string $name): object
    {
        if (!isset($this->categoryClasses[$name])) {
            throw new \InvalidArgumentException('Unknown Discord category: '.$name);
        }

        return $this->categories[$name] ??= new ($this->categoryClasses[$name])($this->resourceClient);
    }

    private function validateOptions(array $options): array
    {
        $defaults = [
            'token'             => null,
            'tokenType'         => 'Bot',
            'logger'            => new NullLogger(),
            'guzzleOptions'     => [],
            'middleware'        => [],
            'rateLimitProvider' => new MemoryRateLimitProvider(),
            'throwOnRatelimit'  => false,
            'httpHandler'       => null,
            'globalRateLimit'   => 50,
        ];
        foreach ($options as $name => $_) {
            if (!array_key_exists($name, $defaults)) {
                throw new \InvalidArgumentException("Unknown Discord client option: {$name}.");
            }
        }
        $options += $defaults;

        if ($options['token'] !== null && !is_string($options['token'])) {
            throw new \InvalidArgumentException('token must be a string or null.');
        }
        if (!is_string($options['tokenType']) || !in_array($options['tokenType'], ['Bot', 'OAuth'], true)) {
            throw new \InvalidArgumentException('tokenType must be Bot or OAuth.');
        }
        if (!$options['logger'] instanceof LoggerInterface) {
            throw new \InvalidArgumentException('logger must implement LoggerInterface.');
        }
        if (!is_array($options['guzzleOptions'])) {
            throw new \InvalidArgumentException('guzzleOptions must be an array.');
        }
        foreach (['base_uri', 'handler', 'headers', 'auth', 'http_errors'] as $name) {
            if (array_key_exists($name, $options['guzzleOptions'])) {
                throw new \InvalidArgumentException("guzzleOptions cannot set {$name}.");
            }
        }
        if (!is_array($options['middleware'])) {
            throw new \InvalidArgumentException('middleware must be an array.');
        }
        foreach ($options['middleware'] as $middleware) {
            if (!is_callable($middleware)) {
                throw new \InvalidArgumentException('middleware entries must be callable.');
            }
        }
        if (!$options['rateLimitProvider'] instanceof RateLimitProviderInterface) {
            throw new \InvalidArgumentException('rateLimitProvider must implement RateLimitProviderInterface.');
        }
        if (!is_bool($options['throwOnRatelimit'])) {
            throw new \InvalidArgumentException('throwOnRatelimit must be a boolean.');
        }
        if ($options['httpHandler'] !== null && !is_callable($options['httpHandler'])) {
            throw new \InvalidArgumentException('httpHandler must be callable or null.');
        }
        if (!is_int($options['globalRateLimit']) || $options['globalRateLimit'] < 1) {
            throw new \InvalidArgumentException('globalRateLimit must be a positive integer.');
        }

        return $options;
    }

    private function version(): string
    {
        if (!class_exists(InstalledVersions::class) || !InstalledVersions::isInstalled('restcord/restcord')) {
            return 'dev-main';
        }

        return InstalledVersions::getPrettyVersion('restcord/restcord') ?? 'dev-main';
    }
}
