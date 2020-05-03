<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;

class PaymentType
{
    public const
        NAME = 'name',
        DESCRIPTION ='description',
        MIN_LIMIT = 'min_limit',
        MAX_LIMIT = 'max_limit';

    private $name;
    private $description;
    private $minLimit;
    private $maxLimit;

    public function __construct(string $name, string $description, Money $minLimit, Money $maxLimit)
    {
        $this->name = $name;
        $this->description = $description;
        $this->minLimit = $minLimit;
        $this->maxLimit = $maxLimit;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getMinLimit(): Money
    {
        return $this->minLimit;
    }

    public function getMaxLimit(): Money
    {
        return $this->maxLimit;
    }

    public function toArray(): array
    {
        return [
            self::NAME => $this->getName(),
            self::DESCRIPTION => $this->getDescription(),
            self::MIN_LIMIT => $this->getMinLimit()->toArray(),
            self::MAX_LIMIT => $this->getMaxLimit()->toArray(),
        ];
    }
}
