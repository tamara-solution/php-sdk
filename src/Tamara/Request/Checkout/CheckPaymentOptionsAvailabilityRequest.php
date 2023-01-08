<?php

declare (strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Checkout\PaymentOptionsAvailability;

class CheckPaymentOptionsAvailabilityRequest
{

    /**
     * @var PaymentOptionsAvailability
     */
    private $paymentOptionsAvailability;

    /**
     * @param PaymentOptionsAvailability $paymentOptionsAvailability
     */
    public function __construct(PaymentOptionsAvailability $paymentOptionsAvailability)
    {
        $this->paymentOptionsAvailability = $paymentOptionsAvailability;
    }

    /**
     * @return PaymentOptionsAvailability
     */
    public function getPaymentOptionsAvailability()
    {
        return $this->paymentOptionsAvailability;
    }
}
