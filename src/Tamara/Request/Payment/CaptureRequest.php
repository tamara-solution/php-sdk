<?php

declare(strict_types=1);

namespace Tamara\Request\Payment;

use Tamara\Model\Payment\Capture;

class CaptureRequest
{
    /**
     * @var Capture
     */
    private $capture;

    public function __construct(Capture $capture)
    {
        $this->capture = $capture;
    }

    public function getCapture(): Capture
    {
        return $this->capture;
    }
}
