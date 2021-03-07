<?php

namespace Tamara\HttpClient;

use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

class AdapterFactory
{
    public static function create(int $requestTimeout, LoggerInterface $logger = null): ClientInterface
    {
        // have an issue with psr7 stream (empty request body)
        if (class_exists(Request::class) && version_compare(PHP_VERSION, '7.3.0') >= 0) {
            return new GuzzleHttpAdapter($requestTimeout, $logger);
        }

        return new NyholmHttpAdapter($requestTimeout, $logger);
    }
}