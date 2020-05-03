<?php

namespace Tamara\HttpClient;

use GuzzleHttp\ClientInterface as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Throwable;
use Tamara\Exception\RequestException;

class GuzzleHttpAdapter implements ClientInterface
{
    /**
     * @var GuzzleHttpClient
     */
    protected $client;

    /**
     * @var int
     */
    protected $requestTimeout;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param GuzzleHttpClient     $client
     * @param int                  $requestTimeout
     * @param LoggerInterface|null $logger
     */
    public function __construct(GuzzleHttpClient $client, int $requestTimeout, LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->requestTimeout = $requestTimeout;
        $this->logger = $logger;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws RequestException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->send(
                $request,
                [
                    'timeout' => $this->requestTimeout,
                ]
            );
        } catch (Throwable | GuzzleException | GuzzleRequestException $exception) {
            if (null !== $this->logger) {
                $this->logger->error($exception->getMessage(), $exception->getTrace());
            }

            throw new RequestException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getRequest(),
                $exception->getResponse(),
                $exception->getPrevious()
            );
        }
    }
}
