<?php

declare(strict_types=1);

namespace Tamara\Model\Payment;

class SimplifiedRefund
{
    public const
        ORDER_ID = 'order_id',
        COMMENT = 'comment',
        REFUND_ID = 'refund_id',
        CAPTURE_ID = 'capture_id',
        ORDER_STATUS = 'status',
        REFUNDED_AMOUNT = 'refunded_amount';
}
