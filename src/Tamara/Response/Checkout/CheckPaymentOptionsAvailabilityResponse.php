<?php

declare(strict_types=1);

namespace Tamara\Response\Checkout;

use Tamara\Response\ClientResponse;

class CheckPaymentOptionsAvailabilityResponse extends ClientResponse
{
    public const HAS_AVAILABLE_PAYMENT_OPTIONS = 'has_available_payment_options';

    public const SINGLE_CHECKOUT_ENABLED = 'single_checkout_enabled';

    public const AVAILABLE_PAYMENT_LABELS = 'available_payment_labels';

    /**
     * @var bool
     */
    private $hasAvailablePaymentOptions = false;

    /**
     * @var bool
     */
    private $singleCheckoutEnabled = false;

    /**
     * @var array
     */
    private $availablePaymentLabels = [];

    public function hasAvailablePaymentOptions(): bool
    {
        return $this->hasAvailablePaymentOptions;
    }

    public function isSingleCheckoutEnabled(): bool
    {
        return $this->singleCheckoutEnabled;
    }

    public function getAvailablePaymentLabels(): array
    {
        return $this->availablePaymentLabels;
    }

    protected function parse(array $responseData): void
    {
        $this->hasAvailablePaymentOptions = $responseData[self::HAS_AVAILABLE_PAYMENT_OPTIONS];
        $this->singleCheckoutEnabled = $responseData[self::SINGLE_CHECKOUT_ENABLED];
        $this->availablePaymentLabels = $responseData[self::AVAILABLE_PAYMENT_LABELS];
    }
}
