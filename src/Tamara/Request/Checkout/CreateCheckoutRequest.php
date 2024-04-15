<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Order\Order;

class CreateCheckoutRequest
{
    /**
     * @var Order
     */
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

}
