<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

use Yuriizee\SenseBankInstallmentSDK\Requests\Guarantee;
use Yuriizee\SenseBankInstallmentSDK\Requests\Order;
use Yuriizee\SenseBankInstallmentSDK\Requests\Statement;

interface Contract
{
    public function order(): Order;

    public function guarantee(): Guarantee;

    public function statement(): Statement;
}
