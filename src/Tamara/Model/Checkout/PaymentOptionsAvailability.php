<?php

declare (strict_types=1);

namespace Tamara\Model\Checkout;

class PaymentOptionsAvailability
{

    public const COUNTRY = 'country',
        ORDER_VALUE = 'order_value',
        PHONE_NUMBER = 'phone_number',
        IS_VIP = 'is_vip';

    private $country;
    private $orderValue;
    private $phoneNumber;
    private $isVip;

    public function setIsVip($isVip)
    {
        $this->isVip = $isVip;
        return $this;
    }

    public function toArray()
    {
        return [
            self::COUNTRY => $this->getCountry(),
            self::ORDER_VALUE => $this->getOrderValue()->toArray(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::IS_VIP => $this->isVip()
        ];
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return \Tamara\Model\Money
     */
    public function getOrderValue()
    {
        return $this->orderValue;
    }

    public function setOrderValue(\Tamara\Model\Money $orderValue)
    {
        $this->orderValue = $orderValue;
        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function isVip()
    {
        return $this->isVip;
    }
}
