<?php

declare(strict_types=1);

namespace Tamara\Response\Order;

use DateTimeImmutable;
use Tamara\Model\Money;
use Tamara\Response\ClientResponse;

class AuthoriseOrderResponse extends ClientResponse
{
    private const ORDER_ID = 'order_id';

    private const STATUS = 'status';

    private const ORDER_EXPIRY_TIME = 'order_expiry_time';

    private const PAYMENT_TYPE = 'payment_type';

    private const AUTO_CAPTURED = 'auto_captured';

    private const AUTHORIZED_AMOUNT = 'authorized_amount';

    private const CAPTURE_ID = 'capture_id';

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

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var bool
     */
    private $autoCaptured;

    /**
     * @var Money
     */
    private $authorizedAmount;

    /**
     * @var string
     */
    private $captureId;

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function getOrderExpiryTime(): ?DateTimeImmutable
    {
        return $this->orderExpiryTime;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function getAutoCaptured(): bool
    {
        return $this->autoCaptured ?? false;
    }

    public function getAuthorizedAmount(): ?Money
    {
        return $this->authorizedAmount;
    }

    public function getCaptureId(): ?string
    {
        return $this->captureId;
    }

    /**
     * @throws \Exception
     */
    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[self::ORDER_ID];
        $this->orderStatus = $responseData[self::STATUS];
        $this->orderExpiryTime = new DateTimeImmutable($responseData[self::ORDER_EXPIRY_TIME]);
        $this->paymentType = $responseData[self::PAYMENT_TYPE];
        $this->autoCaptured = $responseData[self::AUTO_CAPTURED];
        $this->authorizedAmount = Money::fromArray($responseData[self::AUTHORIZED_AMOUNT]);
        $this->captureId = $responseData[self::CAPTURE_ID];
    }
}
