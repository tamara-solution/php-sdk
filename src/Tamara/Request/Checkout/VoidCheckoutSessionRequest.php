<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

class VoidCheckoutSessionRequest
{
    public const ORDER_ID = 'order_id',
        STORE_CODE = 'store_code';

    /**
     * @var string $checkoutId
     */
    private $checkoutId;
    /**
     * @var string $orderId
     */
    private $orderId;
    /**
     * @var string|null $storeCode
     */
    private $storeCode;

    /**
     * @param string $checkoutId
     * @param string $orderId
     * @param string $storeCode
     */
    public function __construct(string $checkoutId, string $orderId, string $storeCode = '')
    {
        $this->checkoutId = $checkoutId;
        $this->orderId = $orderId;
        $this->storeCode = $storeCode;
    }

    /**
     * @return string
     */
    public function getCheckoutId(): string
    {
        return $this->checkoutId;
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
    public function getStoreCode(): string
    {
        return $this->storeCode;
    }
}
