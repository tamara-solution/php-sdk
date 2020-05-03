<?php

declare(strict_types=1);

namespace Tamara\Model;

use DateTimeImmutable;

class ShippingInfo
{
    public const
        SHIPPED_AT = 'shipped_at',
        SHIPPING_COMPANY = 'shipping_company',
        TRACKING_NUMBER = 'tracking_number',
        TRACKING_URL = 'tracking_url';

    /**
     * @var DateTimeImmutable
     */
    private $shippedAt;

    /**
     * @var string
     */
    private $shippingCompany;

    /**
     * @var string|null
     */
    private $trackingNumber;

    /**
     * @var string|null
     */
    private $trackingUrl;

    public function __construct(
        DateTimeImmutable $shippedAt,
        string $shippingCompany,
        ?string $trackingNumber = null,
        ?string $trackingUrl = null
    ) {
        $this->shippedAt = $shippedAt;
        $this->shippingCompany = $shippingCompany;
        $this->trackingNumber = $trackingNumber;
        $this->trackingUrl = $trackingUrl;
    }

    public function getShippedAt(): DateTimeImmutable
    {
        return $this->shippedAt;
    }

    public function getShippingCompany(): string
    {
        return $this->shippingCompany;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    public function toArray(): array
    {
        return [
            self::SHIPPED_AT       => $this->getShippedAt()->format(\DateTime::ATOM),
            self::SHIPPING_COMPANY => $this->getShippingCompany(),
            self::TRACKING_NUMBER  => $this->getTrackingNumber(),
            self::TRACKING_URL     => $this->getTrackingUrl(),
        ];
    }
}
