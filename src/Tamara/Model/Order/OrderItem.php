<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;

class OrderItem
{
    public const
        REFERENCE_ID = 'reference_id',
        TYPE = 'type',
        NAME = 'name',
        SKU = 'sku',
        QUANTITY = 'quantity',
        TAX_AMOUNT = 'tax_amount',
        TOTAL_AMOUNT = 'total_amount',
        UNIT_PRICE = 'unit_price',
        DISCOUNT_AMOUNT = 'discount_amount',
        IMAGE_URL = 'image_url';

    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var Money|null
     */
    private $unitPrice;

    /**
     * @var Money|null
     */
    private $discountAmount;

    /**
     * @var string
     */
    private $imageUrl;

    public static function fromArray(array $data): OrderItem
    {
        $self = new self();
        $self->setName($data[self::NAME]);
        $self->setReferenceId($data[self::REFERENCE_ID]);
        $self->setSku($data[self::SKU]);
        $self->setType($data[self::TYPE]);
        $self->setQuantity($data[self::QUANTITY]);
        $self->setUnitPrice(Money::fromArray($data[self::UNIT_PRICE]));
        $self->setTotalAmount(Money::fromArray($data[self::TOTAL_AMOUNT]));
        $self->setTaxAmount(Money::fromArray($data[self::TAX_AMOUNT]));
        $self->setDiscountAmount(Money::fromArray($data[self::DISCOUNT_AMOUNT]));
        $self->setImageUrl($data[self::IMAGE_URL] ?? '');

        return $self;
    }

    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return Money
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @return Money
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @return Money|null
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @return Money|null
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * @param string $referenceId
     */
    public function setReferenceId(string $referenceId)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param Money $taxAmount
     */
    public function setTaxAmount(Money $taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }

    /**
     * @param Money $totalAmount
     */
    public function setTotalAmount(Money $totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @param Money|null $unitPrice
     */
    public function setUnitPrice(Money $unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @param Money|null $discountAmount
     */
    public function setDiscountAmount(Money $discountAmount)
    {
        $this->discountAmount = $discountAmount;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl ?? '';
    }

    public function toArray(): array
    {
        return [
            self::REFERENCE_ID    => $this->getReferenceId(),
            self::TYPE            => $this->getType(),
            self::NAME            => $this->getName(),
            self::SKU             => $this->getSku(),
            self::QUANTITY        => $this->getQuantity(),
            self::TAX_AMOUNT      => $this->getTaxAmount()->toArray(),
            self::TOTAL_AMOUNT    => $this->getTotalAmount()->toArray(),
            self::UNIT_PRICE      => $this->getUnitPrice() ? $this->getUnitPrice()->toArray() : null,
            self::DISCOUNT_AMOUNT => $this->getDiscountAmount() ? $this->getDiscountAmount()->toArray() : null,
            self::IMAGE_URL       => $this->getImageUrl(),
        ];
    }
}
