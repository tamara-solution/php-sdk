<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;

class InstoreOrder
{
    public const ORDER_ID = 'order_id';

    public const TOTAL_AMOUNT = 'total_amount';

    public const PHONE_NUMBER = 'phone_number';

    public const EMAIL = 'email';

    public const EXPIRY_TIME = 'expiry_time';

    public const ITEMS = 'items';

    public const PAYMENT_TYPE = 'payment_type';

    public const ORDER_REFERENCE_ID = 'order_reference_id';

    public const ORDER_NUMBER = 'order_number';

    public const LOCALE = 'locale';

    public const ADDITIONAL_DATA = 'additional_data';

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var int|null
     */
    private $expiryTime;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var string
     */
    private $orderReferenceId;

    /**
     * @var string|null
     */
    private $orderNumber;

    /**
     * @var array|null
     */
    private $additionalData;

    /**
     * @var string|null
     */
    private $locale;

    /**
     * @var string|null
     */
    private $paymentType;

    public function toArray(): array
    {
        $result = [
            self::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::ITEMS => $this->getItems()->toArray(),
            self::ORDER_REFERENCE_ID => $this->getOrderReferenceId(),
        ];

        if ($this->getEmail() !== null) {
            $result[self::EMAIL] = $this->getEmail();
        }
        if ($this->getExpiryTime() > 0) {
            $result[self::EXPIRY_TIME] = $this->getExpiryTime();
        }
        if ($this->getOrderNumber() !== null) {
            $result[self::ORDER_NUMBER] = $this->getOrderNumber();
        }
        if ($this->getAdditionalData() !== null) {
            $result[self::ADDITIONAL_DATA] = $this->getAdditionalData();
        }
        if ($this->getLocale() !== null) {
            $result[self::LOCALE] = $this->getLocale();
        }
        if ($this->getPaymentType() !== null) {
            $result[self::PAYMENT_TYPE] = $this->getPaymentType();
        }

        return $result;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Money $totalAmount): InstoreOrder
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): InstoreOrder
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function setItems(OrderItemCollection $items): InstoreOrder
    {
        $this->items = $items;

        return $this;
    }

    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    public function setOrderReferenceId(string $orderReferenceId): InstoreOrder
    {
        $this->orderReferenceId = $orderReferenceId;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): InstoreOrder
    {
        $this->email = $email;

        return $this;
    }

    public function getExpiryTime(): ?int
    {
        return $this->expiryTime;
    }

    public function setExpiryTime(?int $expiryTime): InstoreOrder
    {
        $this->expiryTime = $expiryTime;

        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?string $orderNumber): InstoreOrder
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getAdditionalData(): ?array
    {
        return $this->additionalData;
    }

    public function setAdditionalData(?array $additionalData): InstoreOrder
    {
        $this->additionalData = $additionalData;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): InstoreOrder
    {
        $this->locale = $locale;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(?string $paymentType): InstoreOrder
    {
        $this->paymentType = $paymentType;

        return $this;
    }
}
