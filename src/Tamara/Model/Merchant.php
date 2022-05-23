<?php

declare (strict_types=1);

namespace Tamara\Model;

class Merchant
{
    public const MERCHANT_ID = 'merchant_id',
        SINGLE_CHECKOUT_ENABLED = 'single_checkout_enabled';

    private $merchantId;
    private $singleCheckoutEnabled;

    public static function fromArray(array $data)
    {
        $self = new self();
        $self->setMerchantId($data[self::MERCHANT_ID]);
        $self->setSingleCheckoutEnabled($data[self::SINGLE_CHECKOUT_ENABLED]);
        return $self;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function setMerchantId(string $merchantId)
    {
        $this->merchantId = $merchantId;
    }

    public function getSingleCheckoutEnabled()
    {
        return $this->singleCheckoutEnabled;
    }

    public function setSingleCheckoutEnabled(bool $singleCheckoutEnabled)
    {
        $this->singleCheckoutEnabled = $singleCheckoutEnabled;
    }
}
