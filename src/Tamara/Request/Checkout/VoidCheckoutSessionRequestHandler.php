<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\VoidCheckoutSessionResponse;

class VoidCheckoutSessionRequestHandler extends AbstractRequestHandler
{
    private const VOID_CHECKOUT_SESSION_ENDPOINT = '/checkout/%s/void';

    public function __invoke(VoidCheckoutSessionRequest $request): VoidCheckoutSessionResponse
    {
        $bodyData = [VoidCheckoutSessionRequest::ORDER_ID => $request->getOrderId(), VoidCheckoutSessionRequest::STORE_CODE => $request->getStoreCode()];
        $response = $this->httpClient->post(
            sprintf(self::VOID_CHECKOUT_SESSION_ENDPOINT, $request->getCheckoutId()),
            $bodyData
        );

        return new VoidCheckoutSessionResponse($response);
    }
}
