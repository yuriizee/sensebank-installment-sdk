<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class CheckReversalOrderRequest extends DataObject
{
    public function __construct(
        public readonly string|int $orderId,
        public readonly string|int $reversalSum,
    ) {
    }
}
