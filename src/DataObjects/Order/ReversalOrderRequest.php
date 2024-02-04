<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class ReversalOrderRequest extends DataObject
{
    public function __construct(
        public readonly string|int $orderId,
        public readonly string|int $reversalId,
        public readonly string|int $reversalSum,
        public readonly string $callBackURL,
        public readonly ?string $reasonReversal = null,
        public readonly ?string $addDataReversal = null,
        public readonly null|int|string $reversalVat = null,
        public readonly ?string $shopId = null,
    ) {
    }
}
