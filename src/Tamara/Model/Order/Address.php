<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

class Address
{
    public const
        FIRST_NAME = 'first_name',
        LAST_NAME = 'last_name',
        LINE1 = 'line1',
        LINE2 = 'line2',
        REGION = 'region',
        CITY = 'city',
        COUNTRY_CODE = 'country_code',
        PHONE_NUMBER = 'phone_number';

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $line1;

    /**
     * @var string|null
     */
    private $line2;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $phoneNumber;

    public function setFirstName(string $firstName): Address
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): Address
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setLine1(string $line1): Address
    {
        $this->line1 = $line1;

        return $this;
    }

    public function setLine2(string $line2): Address
    {
        $this->line2 = $line2;

        return $this;
    }

    public function setRegion(string $region): Address
    {
        $this->region = $region;

        return $this;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;

        return $this;
    }

    public function setCountryCode(string $countryCode): Address
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function setPhoneNumber(string $phoneNumber): Address
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getLine1(): string
    {
        return $this->line1;
    }

    public function getLine2(): string
    {
        return $this->line2 ?? '';
    }

    public function getRegion(): string
    {
        return $this->region ?? 'N/A';
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber ?? '';
    }

    public function toArray(): array
    {
        return [
            self::FIRST_NAME   => $this->getFirstName(),
            self::LAST_NAME    => $this->getLastName(),
            self::LINE1        => $this->getLine1(),
            self::LINE2        => $this->getLine2(),
            self::REGION       => $this->getRegion(),
            self::CITY         => $this->getCity(),
            self::COUNTRY_CODE => $this->getCountryCode(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
        ];
    }
}
