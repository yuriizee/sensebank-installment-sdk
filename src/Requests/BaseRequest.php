<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Requests;

use Psr\Http\Client\ClientInterface;

abstract class BaseRequest
{
    public function __construct(
        protected ClientInterface $client,
        private readonly ?string $partnerId = null,
    ) {
    }

    protected function http(): ClientInterface
    {
        return $this->client;
    }

    protected function getPartnerId(): int|string|null
    {
        return $this->partnerId;
    }
}
