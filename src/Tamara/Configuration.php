<?php

namespace Tamara;

use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Tamara\Factory\RequestFactory;
use Tamara\HttpClient\GuzzleHttpAdapter;
use Tamara\HttpClient\HttpClient;

class Configuration
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @var int in seconds
     */
    protected $apiRequestTimeout = 30;

    /**
     * @var ClientInterface
     */
    protected $transport;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param string               $apiUrl
     * @param string               $apiToken
     * @param int|null             $apiRequestTimeout
     * @param LoggerInterface      $logger
     * @param ClientInterface|null $transport
     *
     * @return Configuration
     */
    public static function create(
        string $apiUrl,
        string $apiToken,
        int $apiRequestTimeout = null,
        LoggerInterface $logger = null,
        ClientInterface $transport = null
    ): Configuration {
        return new static($apiUrl, $apiToken, $apiRequestTimeout, $logger, $transport);
    }

    /**
     * @param string               $apiUrl
     * @param string               $apiToken
     * @param int|null             $apiRequestTimeout
     * @param LoggerInterface      $logger
     * @param ClientInterface|null $transport
     */
    public function __construct(
        string $apiUrl,
        string $apiToken,
        int $apiRequestTimeout = null,
        LoggerInterface $logger = null,
        ClientInterface $transport = null
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;

        if (null !== $apiRequestTimeout) {
            $this->apiRequestTimeout = $apiRequestTimeout;
        }

        $this->logger = $logger;
        $this->transport = $transport;
    }

    /**
     * @return HttpClient
     */
    public function createHttpClient(): HttpClient
    {
        $transport = $this->transport ?? $this->createDefaultTransport();

        return new HttpClient(
            $this->getApiUrl(),
            $this->getApiToken(),
            $transport,
            new RequestFactory()
        );
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    /**
     * @return int
     */
    public function getApiRequestTimeout(): int
    {
        return $this->apiRequestTimeout;
    }

    /**
     * @return LoggerInterface|null
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @return ClientInterface
     */
    protected function createDefaultTransport(): ClientInterface
    {
        return new GuzzleHttpAdapter(new Client(), $this->getApiRequestTimeout(), $this->logger);
    }
}
