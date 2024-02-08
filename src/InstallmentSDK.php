<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

use Psr\Http\Client\ClientInterface;
use Yuriizee\SenseBankInstallmentSDK\Exceptions\CannotUnSerialize;
use Yuriizee\SenseBankInstallmentSDK\Requests\Guarantee;
use Yuriizee\SenseBankInstallmentSDK\Requests\Order;
use Yuriizee\SenseBankInstallmentSDK\Requests\Statement;

final class InstallmentSDK implements Contract
{
    private static self|null $instance = null;

    private function __construct(
        private readonly Config $config,
        private readonly ClientInterface $httpClient
    ) {
    }

    private function __clone(): void
    {
    }

    public function __wakeup(): void
    {
        throw new CannotUnSerialize();
    }

    public static function getInstance(
        Config $config,
        ClientInterface $client,
    ): self {
        if (self::$instance === null) {
            self::$instance = new self($config, $client);
        }

        return self::$instance;
    }

    public function order(): Order
    {
        return new Order(client: $this->getHttpClient(), partnerId: $this->config->getPartnerId());
    }

    public function guarantee(): Guarantee
    {
        return new Guarantee(client: $this->getHttpClient(), partnerId: $this->config->getPartnerId());
    }

    public function statement(): Statement
    {
        return new Statement(client: $this->getHttpClient());
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }
}
