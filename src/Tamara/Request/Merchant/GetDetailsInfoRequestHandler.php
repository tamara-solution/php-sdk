<?php

declare(strict_types=1);

namespace Tamara\Request\Merchant;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Merchant\GetDetailsInfoResponse;

class GetDetailsInfoRequestHandler extends AbstractRequestHandler
{
    private const MERCHANT_PROFILE_ENDPOINT = '/merchants/profile';

    public function __invoke(GetDetailsInfoRequest $request)
    {
        $response = $this->httpClient->get(
            self::MERCHANT_PROFILE_ENDPOINT,
            []
        );

        return new GetDetailsInfoResponse($response);
    }
}
