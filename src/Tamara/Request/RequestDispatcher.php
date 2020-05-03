<?php

declare(strict_types=1);

namespace Tamara\Request;

use Tamara\Exception\RequestDispatcherException;
use Tamara\HttpClient\HttpClient;
use Tamara\Response\ClientResponse;

class RequestDispatcher
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param object $request
     *
     * @return mixed
     *
     * @throws RequestDispatcherException
     */
    public function dispatch($request)
    {
        $requestClass = get_class($request);
        $handlerClass = $requestClass . 'Handler';

        if (!class_exists($handlerClass)) {
            throw new RequestDispatcherException(sprintf(
                'Missing handler for this request, please add %s',
                $handlerClass
            ));
        }

        $handler = new $handlerClass($this->httpClient);

        $response = $handler($request);

        if (!$response instanceof ClientResponse) {
            throw new RequestDispatcherException(sprintf(
                'The response of the %s::__invoke must be type of %s',
                $handlerClass,
                ClientResponse::class
            ));
        }

        return $response;
    }
}
