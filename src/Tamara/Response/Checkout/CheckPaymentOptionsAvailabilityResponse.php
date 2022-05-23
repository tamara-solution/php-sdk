<?php

declare(strict_types=1);

namespace Tamara\Response\Checkout;

use Tamara\Response\ClientResponse;

class CheckPaymentOptionsAvailabilityResponse extends ClientResponse
{

    public const HAS_AVAILABLE_PAYMENT_OPTIONS = 'has_available_payment_options';

    private $hasAvailablePaymentOptions;

    /**
     * @return bool
     */
    public function hasAvailablePaymentOptions()
    {
        return boolval($this->hasAvailablePaymentOptions);
    }

    protected function parse(array $responseData): void
    {
        $this->hasAvailablePaymentOptions = $responseData[self::HAS_AVAILABLE_PAYMENT_OPTIONS];
    }
}
