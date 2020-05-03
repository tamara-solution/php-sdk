<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

class Consumer
{
    public const
        FIRST_NAME = 'first_name',
        LAST_NAME = 'last_name',
        EMAIL = 'email',
        PHONE_NUMBER = 'phone_number',
        NATIONAL_ID = 'national_id',
        DATE_OF_BIRTH = 'date_of_birth',
        IS_FIRST_ORDER = 'is_first_order';

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
    private $phoneNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string|null
     */
    private $nationalId;

    /**
     * @var string|null
     */
    private $dateOfBirth;

    /**
     * @var bool|null
     */
    private $isFirstOrder;

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string|null $nationalId
     */
    public function setNationalId($nationalId)
    {
        $this->nationalId = $nationalId;
    }

    /**
     * @param string|null $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @param bool|null $isFirstOrder
     */
    public function setIsFirstOrder(?bool $isFirstOrder): void
    {
        $this->isFirstOrder = $isFirstOrder;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getNationalId()
    {
        return $this->nationalId ?? null;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @return bool|null
     */
    public function getIsFirstOrder(): ?bool
    {
        return $this->isFirstOrder;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            self::FIRST_NAME     => $this->getFirstName(),
            self::LAST_NAME      => $this->getLastName(),
            self::EMAIL          => $this->getEmail(),
            self::PHONE_NUMBER   => $this->getPhoneNumber(),
            self::NATIONAL_ID    => $this->getNationalId(),
            self::DATE_OF_BIRTH  => $this->getDateOfBirth(),
            self::IS_FIRST_ORDER => $this->getIsFirstOrder(),
        ];
    }
}
