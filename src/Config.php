<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

final readonly class Config
{
    public function __construct(
        private string $url,
        private string|int $partnerId,
        private string $password,
    ) {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getPartnerId(): int|string
    {
        return $this->partnerId;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
