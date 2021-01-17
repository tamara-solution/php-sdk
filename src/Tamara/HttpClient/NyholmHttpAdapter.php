<?php

namespace Tamara\HttpClient;

use Buzz\Client\Curl;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Tamara\Exception\RequestException;

class NyholmHttpAdapter implements ClientInterface
{
    private $client;

    /**
     * @var int
     */
    protected $requestTimeout;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(int $requestTimeout, LoggerInterface $logger = null)
    {
        $this->requestTimeout = $requestTimeout;
        $this->logger = $logger;
        $this->client = new Curl(new Psr17Factory());
    }


    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->sendRequest(
                $request,
                [
                    'timeout' => $this->requestTimeout,
                ]
            );
        } catch (\Throwable $exception) {
            if (null !== $this->logger) {
                $this->logger->error($exception->getMessage(), $exception->getTrace());
            }

            throw new RequestException(
                $exception->getMessage(),
                $exception->getCode(),
                $request,
                null,
                $exception->getPrevious()
            );
        }
    }
}