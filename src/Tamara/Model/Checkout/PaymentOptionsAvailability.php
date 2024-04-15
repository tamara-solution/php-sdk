<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;

class PaymentOptionsAvailability
{
    public const COUNTRY = 'country';

    public const ORDER_VALUE = 'order_value';

    public const PHONE_NUMBER = 'phone_number';

    public const IS_VIP = 'is_vip';

    /**
     * @var string
     */
    private $country;

    /**
     * @var Money
     */
    private $orderValue;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var bool
     */
    private $isVip;

    public function __construct(string $country, Money $orderValue, string $phoneNumber, bool $isVip = true)
    {
        $this->country = $country;
        $this->orderValue = $orderValue;
        $this->phoneNumber = $phoneNumber;
        $this->isVip = $isVip;
    }

    public function toArray(): array
    {
        return [
            self::COUNTRY => $this->getCountry(),
            self::ORDER_VALUE => $this->getOrderValue()->toArray(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::IS_VIP => $this->isVip(),
        ];
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getOrderValue(): Money
    {
        return $this->orderValue;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function isVip(): bool
    {
        return $this->isVip;
    }
}
