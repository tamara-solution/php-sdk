<?php

declare(strict_types=1);

namespace Tamara\Response\Merchant;

use Tamara\Model\Merchant;
use Tamara\Response\ClientResponse;

class GetPublicConfigsResponse extends ClientResponse
{
    /**
     * @var Merchant
     */
    private $merchant;

    public function getMerchant(): ?Merchant
    {
        return $this->merchant;
    }

    protected function parse(array $responseData): void
    {
        $this->merchant = Merchant::fromArray($responseData);
    }
}
