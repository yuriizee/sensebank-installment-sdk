<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Requests;

use Yuriizee\SenseBankInstallmentSDK\Client;

abstract class BaseRequest
{
    public function __construct(
        protected Client $client
    ) {
    }
}
