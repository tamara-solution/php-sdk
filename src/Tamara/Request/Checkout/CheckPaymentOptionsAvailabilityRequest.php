<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Checkout\PaymentOptionsAvailability;

class CheckPaymentOptionsAvailabilityRequest
{
    /**
     * @var PaymentOptionsAvailability
     */
    private $paymentOptionsAvailability;

    public function __construct(PaymentOptionsAvailability $paymentOptionsAvailability)
    {
        $this->paymentOptionsAvailability = $paymentOptionsAvailability;
    }

    public function getPaymentOptionsAvailability(): PaymentOptionsAvailability
    {
        return $this->paymentOptionsAvailability;
    }
}
