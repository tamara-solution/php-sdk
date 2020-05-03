<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Helper\StringHelper;
use Tamara\Model\Money;
use Tamara\Request\Checkout\CreateCheckoutRequest;
use Tamara\Request\Order\CreateOrderRequest;

class Order
{
    public const
        ORDER_ID = 'order_id',
        TOTAL_AMOUNT = 'total_amount',
        ITEMS = 'items',
        CONSUMER = 'consumer',
        BILLING_ADDRESS = 'billing_address',
        SHIPPING_ADDRESS = 'shipping_address',
        DISCOUNT = 'discount',
        TAX_AMOUNT = 'tax_amount',
        SHIPPING_AMOUNT = 'shipping_amount',
        MERCHANT_URL = 'merchant_url',
        PAYMENT_TYPE = 'payment_type',
        ORDER_REFERENCE_ID = 'order_reference_id',
        DESCRIPTION = 'description',
        COUNTRY_CODE = 'country_code',
        LOCALE = 'locale',
        PLATFORM = 'platform',
        DISCOUNT_AMOUNT = 'discount_amount';

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $merchantId;

    /**
     * @var string
     */
    private $customerId;

    /**
     * @var string
     */
    private $orderReferenceId;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $status;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @var Address
     */
    private $billingAddress;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * @var Discount
     */
    private $discount;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $shippingAmount;

    /**
     * @var MerchantUrl
     */
    private $merchantUrl;

    /**
     * @var string the platform that the merchant is using such as Magento, OpenCart...
     */
    private $platform;

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     */
    public function setMerchantId(string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return string|null
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param string|null $customerId
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getOrderReferenceId()
    {
        return $this->orderReferenceId;
    }

    /**
     * @param string $orderReferenceId
     */
    public function setOrderReferenceId(string $orderReferenceId): void
    {
        $this->orderReferenceId = $orderReferenceId;
    }

    /**
     * @return Money
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param Money $totalAmount
     */
    public function setTotalAmount(Money $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    public function setPaymentType(string $paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return OrderItemCollection
     */
    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    /**
     * @param OrderItemCollection $items
     */
    public function setItems(OrderItemCollection $items)
    {
        $this->items = $items;
    }

    /**
     * @return Consumer
     */
    public function getConsumer(): Consumer
    {
        return $this->consumer;
    }

    /**
     * @param Consumer $consumer
     */
    public function setConsumer(Consumer $consumer)
    {
        $this->consumer = $consumer;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     */
    public function setBillingAddress(Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     */
    public function setShippingAddress(Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return Discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param Discount $discount
     */
    public function setDiscount(Discount $discount)
    {
        $this->discount = $discount;
    }

    /**
     * @return Money
     */
    public function getTaxAmount()
    {
        return $this->taxAmount;
    }

    /**
     * @param Money $taxAmount
     */
    public function setTaxAmount(Money $taxAmount)
    {
        $this->taxAmount = $taxAmount;
    }

    /**
     * @return Money
     */
    public function getShippingAmount()
    {
        return $this->shippingAmount;
    }

    /**
     * @param Money $shippingAmount
     */
    public function setShippingAmount(Money $shippingAmount)
    {
        $this->shippingAmount = $shippingAmount;
    }

    /**
     * @return MerchantUrl
     */
    public function getMerchantUrl()
    {
        return $this->merchantUrl;
    }

    /**
     * @param MerchantUrl $merchantUrl
     */
    public function setMerchantUrl(MerchantUrl $merchantUrl)
    {
        $this->merchantUrl = $merchantUrl;
    }

    /**
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ORDER_REFERENCE_ID => $this->getOrderReferenceId(),
            self::TOTAL_AMOUNT       => $this->getTotalAmount()->toArray(),
            self::DESCRIPTION        => $this->getDescription(),
            self::COUNTRY_CODE       => $this->getCountryCode(),
            self::PAYMENT_TYPE       => $this->getPaymentType(),
            self::LOCALE             => $this->getLocale(),
            self::ITEMS              => $this->getItems()->toArray(),
            self::CONSUMER           => $this->getConsumer()->toArray(),
            self::BILLING_ADDRESS    => $this->getBillingAddress()->toArray(),
            self::SHIPPING_ADDRESS   => $this->getShippingAddress()->toArray(),
            self::DISCOUNT           => $this->getDiscount()->toArray(),
            self::TAX_AMOUNT         => $this->getTaxAmount()->toArray(),
            self::SHIPPING_AMOUNT    => $this->getShippingAmount()->toArray(),
            self::MERCHANT_URL       => $this->getMerchantUrl()->toArray(),
            self::PLATFORM           => $this->getPlatform(),
        ];
    }


}
