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

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * RateLimitProvider Class
 */
abstract class AbstractRateLimitProvider
{
    /**
     * Returns the route for the current URL.
     *
     * @param RequestInterface $request
     *
     * @return \Psr\Http\Message\UriInterface|string
     */
    public function getRoute(RequestInterface $request)
    {
        $route = (string)$request->getUri();

        if ($request->getMethod() === 'DELETE' && strpos($route, 'messages') !== false) {
            $route = 'DELETE-' . $route;
        }

        $stripped = $this->stripMinorParameters($route);

        return $stripped;
    }

    /**
     * Returns what is considered the time when a given request is being made.
     *
     * @todo Get time from the request? Might be more accurate
     *
     * @param RequestInterface $request The request being made.
     *
     * @return float Time when the given request is being made.
     */
    final public function getRequestTime(RequestInterface $request)
    {
        return microtime(true);
    }

    /**
     * Returns when the last request was made.
     *
     * @param RequestInterface $request
     *
     * @return float|null When the last request was made.
     */
    abstract public function getLastRequestTime(RequestInterface $request);

    /**
     * Used to set the current time as the last request time to be queried when
     * the next request is attempted.
     *
     * @param RequestInterface $request
     */
    abstract public function setLastRequestTime(RequestInterface $request);

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
    abstract public function getRequestAllowance(RequestInterface $request);

    /**
     * Used to set the minimum amount of time that is required to pass between
     * this request and the next (in microseconds).
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response The resolved response.
     */
    abstract public function setRequestAllowance(RequestInterface $request, ResponseInterface $response);

    /**
     * Method to match out major parameters of the route and
     * remove minor parameters / numbers. This has to be done
     * to ensure correct rate limiting according to: 
     * https://discord.com/developers/docs/topics/rate-limits
     *
     * @param string $url
     * @return string
     */
    protected function stripMinorParameters(string $url) : string
    {
        $matches = [];
        if (
            (
                preg_match('/^(https:\/\/discord\.com\/api\/v\d+\/channels\/\d*).*?$/', $url, $matches) === 1 ||
                preg_match('/^(https:\/\/discord\.com\/api\/v\d+\/guilds\/\d*).*?$/', $url, $matches) === 1 ||
                preg_match('/^(https:\/\/discord\.com\/api\/v\d+\/users\/@me\/guilds\/\d*).*?$/', $url, $matches) === 1 || 
                preg_match('/^(https:\/\/discord\.com\/api\/v\d+\/webhooks\/\d*).*?$/', $url, $matches) === 1
            ) && count($matches) === 2
        ) {
            $url = $matches[1] . preg_replace('/[0-9]+/', '', substr($url, strlen($matches[1])));
        }

        return $url;
    }
}

