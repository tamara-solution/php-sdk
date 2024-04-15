<?php

namespace Tamara\Response\Checkout;

use Tamara\Model\Checkout\PaymentTypeCollection;
use Tamara\Response\ClientResponse;

class GetPaymentTypesResponse extends ClientResponse
{
    /**
     * @var array|PaymentTypeCollection
     */
    private $paymentTypes;

    public function getPaymentTypes(): ?PaymentTypeCollection
    {
        return $this->isSuccess() ? $this->paymentTypes : null;
    }

    protected function parse(array $responseData): void
    {
        $this->paymentTypes = new PaymentTypeCollection($responseData);
    }
}
