<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

class RemoveWebhookRequest
{
    /**
     * @var string
     */
    private $webhookId;

    public function __construct(string $webhookId)
    {
        $this->webhookId = $webhookId;
    }

    public function getWebhookId(): string
    {
        return $this->webhookId;
    }
}
