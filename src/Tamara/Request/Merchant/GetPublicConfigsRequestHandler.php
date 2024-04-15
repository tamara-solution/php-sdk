<?php

declare(strict_types=1);

namespace Tamara\Request\Merchant;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Merchant\GetPublicConfigsResponse;

class GetPublicConfigsRequestHandler extends AbstractRequestHandler
{
    private const MERCHANT_CONFIGS_ENDPOINT = '/merchants/configs';

    /**
     * @param GetPublicConfigsRequest $request
     * @return GetPublicConfigsResponse
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \Tamara\Exception\RequestException
     */
    public function __invoke(GetPublicConfigsRequest $request)
    {
        $response = $this->httpClient->get(
            self::MERCHANT_CONFIGS_ENDPOINT
        );

        return new GetPublicConfigsResponse($response);
    }
}
