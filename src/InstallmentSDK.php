<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

use Yuriizee\SenseBankInstallmentSDK\Requests\Guarantee;
use Yuriizee\SenseBankInstallmentSDK\Requests\Order;
use Yuriizee\SenseBankInstallmentSDK\Requests\Statement;

final class InstallmentSDK
{
    private static self|null $instance = null;
    private Client $httpClient;

    private function __construct(Config $config)
    {
        $this->httpClient = new Client(
            $config->getUrl(),
            $config->getPartnerId(),
            $config->getPassword()
        );
    }

    private function __clone(): void
    {
    }

    public function __wakeup(): void
    {
        throw new \Exception('Cannot unserialize a singleton.');
    }

    public static function getInstance(Config $config): self
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function order(): Order
    {
        return new Order($this->httpClient);
    }

    public function guarantee(): Guarantee
    {
        return new Guarantee($this->httpClient);
    }

    public function statement(): Statement
    {
        return new Statement($this->httpClient);
    }
}
