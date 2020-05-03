<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;

class Discount
{
    public const
        NAME = 'name',
        AMOUNT = 'amount';

    /**
     * @var string
     */
    private $name;

    /**
     * @var Money
     */
    private $amount;

    public function __construct(string $name, Money $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Money $amount
     */
    public function setAmount(Money $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Money
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function toArray()
    {
        return [
            self::NAME   => $this->getName(),
            self::AMOUNT => $this->getAmount()->toArray(),
        ];
    }
}
