<?php

declare(strict_types=1);

namespace Tamara\Response\Order;

use DateTimeImmutable;
use Tamara\Response\ClientResponse;

class AuthoriseOrderResponse extends ClientResponse
{
    private const
        ORDER_ID = 'order_id',
        STATUS = 'status',
        ORDER_EXPIRY_TIME = 'order_expiry_time';

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $orderStatus;

    /**
     * @var DateTimeImmutable
     */
    private $orderExpiryTime;

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function getOrderExpiryTime(): DateTimeImmutable
    {
        return $this->orderExpiryTime;
    }

    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[self::ORDER_ID];
        $this->orderStatus = $responseData[self::STATUS];
        $this->orderExpiryTime = new DateTimeImmutable($responseData[self::ORDER_EXPIRY_TIME]);
    }
}
