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

namespace RestCord\RateLimit\Provider;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * RedisRateLimitProvider Class
 */
class RedisRateLimitProvider extends AbstractRateLimitProvider
{
    const MAX_TTL = 60 * 60 * 24 * 7;

    /**
     * @var array
     */
    public $options;

    /**
     * @var \Redis
     */
    private $redis;

    /**
     * RedisRateLimitProvider constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = $this->validateOptions($options);

        if ($this->options['client'] !== null) {
            $this->redis = $this->options['client'];
        } else {
            $this->redis = new \Redis();
            $this->redis->connect($this->options['host'], $this->options['port']);
        }
    }

    public function validateOptions(array $options)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefaults(
                [
                    'prefix' => 'restcord.ratelimit.',
                    'host'   => '127.0.0.1',
                    'port'   => 6379,
                    'client' => null,
                ]
            )
            ->setAllowedTypes('port', ['integer'])
            ->setAllowedTypes('host', ['string'])
            ->setAllowedTypes('prefix', ['string'])
            ->setAllowedTypes('client', [\Redis::class, 'null']);

        return $resolver->resolve($options);
    }

    /**
     * Returns the prefixed version of the key.
     *
     * @param string $key
     *
     * @return string
     */
    public function getKey($key)
    {
        return $this->options['prefix'].$key;
    }

    /**
     * Returns when the last request was made.
     *
     * @param RequestInterface $request
     *
     * @return float|null When the last request was made.
     */
    public function getLastRequestTime(RequestInterface $request)
    {
        $route = $this->getRoute($request);
        $key   = $this->getKey($route.'.lastRequest');

        return $this->redis->exists($key) ? $this->redis->get($key) : null;
    }

    /**
     * Used to set the current time as the last request time to be queried when
     * the next request is attempted.
     *
     * @param RequestInterface $request
     */
    public function setLastRequestTime(RequestInterface $request)
    {
        $route = $this->getRoute($request);
        $key   = $this->getKey($route.'.lastRequest');

        $this->redis->setex($key, static::MAX_TTL, $this->getRequestTime($request));
    }

    /**
     * Returns the minimum amount of time that is required to have passed since
     * the last request was made. This value is used to determine if the current
     * request should be delayed, based on when the last request was made.
     *
     * Returns the allowed  between the last request and the next, which
     * is used to determine if a request should be delayed and by how much.
     *
     * @param RequestInterface $request The pending request.
     *
     * @return float The minimum amount of time that is required to have passed
     *               since the last request was made (in microseconds).
     */
    public function getRequestAllowance(RequestInterface $request)
    {
        $route = $this->getRoute($request);
        $key   = $this->getKey($route.'.reset');

        if (!$this->redis->exists($key)) {
            return 0;
        }

        return ($this->redis->get($key) - time()) * 1000000;
    }

    /**
     * Used to set the minimum amount of time that is required to pass between
     * this request and the next (in microseconds).
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response The resolved response.
     */
    public function setRequestAllowance(RequestInterface $request, ResponseInterface $response)
    {
        $route = $this->getRoute($request);

        $remaining = $response->getHeader('X-RateLimit-Remaining');
        $reset     = $response->getHeader('X-RateLimit-Reset');
        if (empty($remaining) || empty($reset) || (int) $remaining[0] > 0) {
            return;
        }

        $this->redis->set($this->getKey($route.'.reset'), static::MAX_TTL, $reset[0]);
    }
}
