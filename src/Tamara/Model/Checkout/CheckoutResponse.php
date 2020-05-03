<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

class CheckoutResponse
{
    public const
        ORDER_ID = 'order_id',
        CHECKOUT_URL = 'checkout_url';

    private $orderId;

    private $checkoutUrl;

    public function __construct(array $response)
    {
        $this->orderId = $response[self::ORDER_ID];
        $this->checkoutUrl = $response[self::CHECKOUT_URL];
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getCheckoutUrl(): string
    {
        return $this->checkoutUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::ORDER_ID => $this->getOrderId(),
            self::CHECKOUT_URL => $this->getCheckoutUrl()
        ];
    }
}
