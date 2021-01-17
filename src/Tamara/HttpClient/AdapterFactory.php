<?php

namespace Tamara\HttpClient;

use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

class AdapterFactory
{
    public static function create(int $requestTimeout, LoggerInterface $logger = null): ClientInterface
    {
        if (class_exists(Request::class)) {
            new GuzzleHttpAdapter($requestTimeout, $logger);
        }

        return new NyholmHttpAdapter($requestTimeout, $logger);
    }
}