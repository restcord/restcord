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

namespace RestCord\RateLimit;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * RateLimitProvider Class
 */
class RateLimitProvider
{
    private $routes = [];

    /**
     * Returns when the last request was made.
     *
     * @param RequestInterface $request
     *
     * @return float|null When the last request was made.
     */
    public function getLastRequestTime(RequestInterface $request)
    {
        $route = $request->getMethod().'-'.$request->getUri();

        if (isset($this->routes[$route])) {
            return isset($this->routes[$route]['lastRequest']) ? $this->routes[$route]['lastRequest'] : null;
        }
    }

    /**
     * Used to set the current time as the last request time to be queried when
     * the next request is attempted.
     *
     * @param RequestInterface $request
     */
    public function setLastRequestTime(RequestInterface $request)
    {
        $route = $request->getMethod().'-'.$request->getUri();

        if (!isset($this->routes[$route])) {
            $this->routes[$route] = [];
        }

        $this->routes[$route]['lastRequest'] = microtime(true);
    }

    /**
     * Returns what is considered the time when a given request is being made.
     *
     * @param RequestInterface $request The request being made.
     *
     * @return float Time when the given request is being made.
     */
    public function getRequestTime(RequestInterface $request)
    {
        return microtime(true);
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
        $route = $request->getMethod().'-'.$request->getUri();
        if (!isset($this->routes[$route])) {
            return 0;
        }

        if (!isset($this->routes[$route]['reset'])) {
            return 0;
        }

        return ($this->routes[$route]['reset'] - time()) * 1000000;
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
        $route = $request->getMethod().'-'.$request->getUri();

        $remaining = $response->getHeader('X-RateLimit-Remaining');
        $reset     = $response->getHeader('X-RateLimit-Reset');
        if (empty($remaining) || empty($reset) || (int) $remaining[0] > 0) {
            return;
        }

        $this->routes[$route]['reset'] = $reset[0];
    }
}
