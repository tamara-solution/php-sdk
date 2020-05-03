<?php

declare(strict_types=1);

namespace Tamara\Factory;

use Tamara\Model\Notification\AbstractMessage;
use Tamara\Model\Notification\Authorised;

class MessageFactory
{
    public static function createModel(array $postData)
    {
        $orderId = $postData[AbstractMessage::ORDER_ID] ?? '';
        $orderStatus = $postData[AbstractMessage::ORDER_STATUS] ?? '';
        $data = $postData[AbstractMessage::DATA];

        switch ($orderStatus) {
            default:
                $message = new Authorised($orderId, $orderStatus);
                $message->setData($data);
                break;
        }

        return $message;
    }



}
