<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Order\InstoreOrder;

class CreateInstoreCheckoutRequest
{
    /**
     * @var InstoreOrder
     */
    private $order;

    public function __construct(InstoreOrder $order)
    {
        $this->order = $order;
    }

    /**
     * @return InstoreOrder
     */
    public function getOrder(): InstoreOrder
    {
        return $this->order;
    }

}
