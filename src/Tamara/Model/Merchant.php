<?php

declare(strict_types=1);

namespace Tamara\Model;

class Merchant
{
    public const SINGLE_CHECKOUT_ENABLED = 'single_checkout_enabled';

    public const PUBLIC_KEY = 'public_key';

    /**
     * @var bool
     */
    private $singleCheckoutEnabled;

    /**
     * @var string
     */
    private $publicKey;

    public function __construct(bool $singleCheckoutEnabled, string $publicKey)
    {
        $this->singleCheckoutEnabled = $singleCheckoutEnabled;
        $this->publicKey = $publicKey;
    }

    public static function fromArray(array $data): Merchant
    {
        return new self($data[self::SINGLE_CHECKOUT_ENABLED], $data[self::PUBLIC_KEY]);
    }

    public function getSingleCheckoutEnabled(): bool
    {
        return $this->singleCheckoutEnabled;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }
}
