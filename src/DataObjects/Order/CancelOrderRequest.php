<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class CancelOrderRequest extends DataObject
{
    public function __construct(
        public readonly string $cancelId,
        public readonly null|string|int $orderId = null,
        public readonly null|string|int $messageId = null,
        public readonly ?string $reasonCancel = null,
    ) {
    }
}
