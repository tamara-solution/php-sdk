<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

class MerchantUrl
{
    public const
        SUCCESS = 'success',
        FAILURE = 'failure',
        CANCEL = 'cancel',
        NOTIFICATION = 'notification';

    /**
     * @var string
     */
    private $successUrl;

    /**
     * @var string
     */
    private $failureUrl;

    /**
     * @var string
     */
    private $cancelUrl;

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl(string $successUrl)
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @param string $failureUrl
     */
    public function setFailureUrl(string $failureUrl)
    {
        $this->failureUrl = $failureUrl;
    }

    /**
     * @param string $cancelUrl
     */
    public function setCancelUrl(string $cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;
    }

    /**
     * @param string $notificationUrl
     */
    public function setNotificationUrl(string $notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
    }

    /**
     * @var string
     */
    private $notificationUrl;

    /**
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * @return string
     */
    public function getFailureUrl()
    {
        return $this->failureUrl;
    }

    /**
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * @return string
     */
    public function getNotificationUrl()
    {
        return $this->notificationUrl;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::SUCCESS => $this->getSuccessUrl(),
            self::FAILURE => $this->getFailureUrl(),
            self::CANCEL => $this->getCancelUrl(),
            self::NOTIFICATION => $this->getNotificationUrl(),
        ];
    }
}
