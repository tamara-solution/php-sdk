<?php

namespace Tamara\Factory;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Tamara\Client;

class RequestFactory
{
    public function create(string $method, string $uri, array $params, string $apiToken): RequestInterface
    {
        $headers = [
            'User-Agent' => sprintf('Voucher Service SDK %s', Client::VERSION),
            'Content-Type' => 'application/json',
            'Authorization' => sprintf('Bearer %s', $apiToken),
        ];

        return new Request(
            $method,
            $uri,
            $headers,
            json_encode($params)
        );
    }
}
