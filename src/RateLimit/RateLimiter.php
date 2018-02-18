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
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use RestCord\RateLimit\Provider\AbstractRateLimitProvider;

/**
 * Guzzle middleware which delays requests if they exceed a rate allowance.
 *
 * @see https://github.com/rtheunissen/guzzle-rate-limiter/blob/master/src/RateLimiter.php
 */
class RateLimiter
{
    /**
     * @var MemoryRateLimitProvider
     */
    private $provider;

    /**
     * @var array
     */
    private $options;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var string|callable Constant or callable that accepts a Response.
     */
    protected $logLevel;

    /**
     * Creates a callable middleware rate limiter.
     *
     * @param MemoryRateLimitProvider $provider A rate data provider.
     * @param array                   $options
     * @param LoggerInterface         $logger
     */
    public function __construct(AbstractRateLimitProvider $provider, array $options, LoggerInterface $logger = null)
    {
        $this->provider = $provider;
        $this->options  = $options;
        $this->logger   = $logger;
    }

    /**
     * Delays and logs the request then sets the allowance for the next request.
     *
     * @param callable $handler
     *
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, $options) use ($handler) {
            // Amount of time to delay the request by
            $delay = $this->getDelay($request);

            if ($delay > 0) {
                if ($this->options['throwOnRatelimit']) {
                    throw new RatelimitException($request->getMethod().' '.$request->getUri());
                }

                $this->log($request, $delay);
                $this->delay($delay);
            }

            // Sets the time when this request is beind made,
            // which allows calculation of allowance later on.
            $this->provider->setLastRequestTime($request);

            // Set the allowance when the response was received
            return $handler($request, $options)->then($this->setAllowance($request));
        };
    }

    /**
     * Logs a request which is being delayed by a specified amount of time.
     *
     * @param RequestInterface $request request being delayed.
     * @param float            $delay   The amount of time that the request is delayed for.
     */
    protected function log(RequestInterface $request, $delay)
    {
        if (isset($this->logger)) {
            $level   = $this->getLogLevel($request);
            $message = $this->getLogMessage($request, $delay);
            $context = compact('request', 'delay');

            $this->logger->log($level, $message, $context);
        }
    }

    /**
     * Formats a request and delay time as a log message.
     *
     * @param RequestInterface $request The request being logged.
     * @param float            $delay   The amount of time that the request is delayed for.
     *
     * @return string Log message
     */
    protected function getLogMessage(RequestInterface $request, $delay)
    {
        return vsprintf(
            "[%s] %s %s will be delayed by {$delay}us",
            [
                gmdate('d/M/Y:H:i:s O'),
                $request->getMethod(),
                $request->getUri(),
            ]
        );
    }

    /**
     * Returns the default log level.
     *
     * @return string LogLevel
     */
    protected function getDefaultLogLevel()
    {
        return LogLevel::DEBUG;
    }

    /**
     * Sets the log level to use, which can be either a string or a callable
     * that accepts a response (which could be null). A log level could also
     * be null, which indicates that the default log level should be used.
     *
     * @param string|callable|null
     */
    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
    }

    /**
     * Returns a log level for a given response.
     *
     * @param RequestInterface $request The request being logged.
     *
     * @return string LogLevel
     */
    protected function getLogLevel(RequestInterface $request)
    {
        if (!$this->logLevel) {
            return $this->getDefaultLogLevel();
        }

        if (is_callable($this->logLevel)) {
            return call_user_func($this->logLevel, $request);
        }

        return (string) $this->logLevel;
    }

    /**
     * Returns the delay duration for the given request (in microseconds).
     *
     * @param RequestInterface $request Request to get the delay duration for.
     *
     * @return float The delay duration (in microseconds).
     */
    protected function getDelay(RequestInterface $request)
    {
        $lastRequestTime  = $this->provider->getLastRequestTime($request);
        $requestAllowance = $this->provider->getRequestAllowance($request);
        $requestTime      = $this->provider->getRequestTime($request);

        // If lastRequestTime is null or false, the max will be 0.
        return max(0, $requestAllowance - ($requestTime - $lastRequestTime));
    }

    /**
     * Delays the given request by an amount of microseconds.
     *
     * @param float $time The amount of time (in microseconds) to delay by.
     *
     * @codeCoverageIgnore
     */
    protected function delay($time)
    {
        usleep($time);
    }

    /**
     * Returns a callable handler which allows the provider to set the request
     * allowance for the next request, using the current response.
     *
     * @param RequestInterface $request
     *
     * @return \Closure Handler to set request allowance on the rate provider.
     */
    protected function setAllowance(RequestInterface $request)
    {
        return function (ResponseInterface $response) use ($request) {
            $this->provider->setRequestAllowance($request, $response);

            return $response;
        };
    }
}
