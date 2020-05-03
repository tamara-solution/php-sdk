<?php

declare(strict_types=1);

namespace Tamara\Notification;

use Tamara\Notification\Exception\NotificationException;

abstract class AbstractMessage
{
    public const
        ORDER_ID = 'order_id',
        ORDER_REFERENCE_ID = 'order_reference_id',
        ORDER_STATUS = 'order_status',
        DATA = 'data';

    /**
     * @var string the Tamara unique order id
     */
    private $orderId;

    /**
     * @var string the merchant unique order id
     */
    private $orderReferenceId;

    /**
     * @var string
     */
    private $orderStatus;

    /**
     * @var array
     */
    private $data;

    public function __construct(string $orderId, string $orderReferenceId, string $orderStatus, array $data)
    {
        $this->orderId = $orderId;
        $this->orderReferenceId = $orderReferenceId;
        $this->orderStatus = $orderStatus;
        $this->data = $data;
    }

    public static function fromArray(array $data): AbstractMessage
    {
        return new static(
            $data[self::ORDER_ID],
            $data[self::ORDER_REFERENCE_ID],
            $data[self::ORDER_STATUS],
            $data[self::DATA]
        );
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getDataByKey(string $key)
    {
        if (!isset($this->data)) {
            throw new NotificationException(sprintf('Invalid key %s', $key));
        }

        return $this->data[$key];
    }
}
