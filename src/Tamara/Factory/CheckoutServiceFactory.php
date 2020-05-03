<?php

namespace Tamara\Factory;

use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Tamara\Client;
use Tamara\CheckoutServiceInterface;
use Tamara\Configuration;

class CheckoutServiceFactory
{
    /**
     * @param string               $apiUrl
     * @param string               $apiToken
     * @param int|null             $apiRequestTimeout
     * @param LoggerInterface      $logger
     * @param ClientInterface|null $transport
     *
     * @return CheckoutServiceInterface
     */
    public function create(
        string $apiUrl,
        string $apiToken,
        int $apiRequestTimeout = null,
        LoggerInterface $logger = null,
        ClientInterface $transport = null
    ): CheckoutServiceInterface {
        $configuration = Configuration::create($apiUrl, $apiToken, $apiRequestTimeout, $logger, $transport);

        return Client::create($configuration);
    }
}
