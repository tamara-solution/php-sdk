<?php

namespace Tamara\Factory;

use Psr\Http\Message\RequestInterface;
use Tamara\Client;

class RequestFactory
{
    public function create(string $method, string $uri, array $params, string $apiToken): RequestInterface
    {
        $headers = [
            'User-Agent' => sprintf('Tamara Client SDK %s', Client::VERSION),
            'Content-Type' => 'application/json',
            'Authorization' => sprintf('Bearer %s', $apiToken),
        ];

        if (class_exists(\GuzzleHttp\Psr7\Request::class)) {
            return new \GuzzleHttp\Psr7\Request(
                $method,
                $uri,
                $headers,
                json_encode($params)
            );
        }

        if (class_exists(\Nyholm\Psr7\Request::class)) {
            return new \Nyholm\Psr7\Request(
                $method,
                $uri,
                $headers,
                json_encode($params)
            );
        }

        throw new \RuntimeException('PSR7 Request is not supported.');
    }
}
