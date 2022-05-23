<?php

declare (strict_types=1);

namespace Tamara\Request\Merchant;

use Tamara\Model\Merchant;

class GetDetailsInfoRequest
{
    /**
     * @var Merchant
     */
    private $merchant;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @return Merchant
     */
    public function getMerchant()
    {
        return $this->merchant;
    }
}
