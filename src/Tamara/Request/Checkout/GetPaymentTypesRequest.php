<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

class GetPaymentTypesRequest
{
    /**
     * @var string
     */
    private $countryCode;

    public function __construct(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }
}
