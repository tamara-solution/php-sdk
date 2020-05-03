<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\GetPaymentTypesResponse;

class GetPaymentTypesRequestHandler extends AbstractRequestHandler
{
    private const GET_PAYMENT_TYPES_ENDPOINT = '/checkout/payment-types';

    public function __invoke(GetPaymentTypesRequest $request)
    {
        $response = $this->httpClient->get(
            self::GET_PAYMENT_TYPES_ENDPOINT,
            ['country' => $request->getCountryCode()]
        );

        return new GetPaymentTypesResponse($response);
    }
}
