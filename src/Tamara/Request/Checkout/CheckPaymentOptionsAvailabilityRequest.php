<?php

declare (strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Checkout\PaymentOptionsAvailability;

class CheckPaymentOptionsAvailabilityRequest
{

    private $paymentOptionsAvailability;

    public function __construct(PaymentOptionsAvailability $paymentOptionsAvailability)
    {
        $this->paymentOptionsAvailability = $paymentOptionsAvailability;
    }

    public function getPaymentOptionAvailability()
    {
        return $this->paymentOptionsAvailability;
    }
}
