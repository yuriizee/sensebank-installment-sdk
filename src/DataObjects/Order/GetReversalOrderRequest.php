<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class GetReversalOrderRequest extends DataObject
{
    public function __construct(
        public readonly null|string|int $reversalId = null,
        public readonly null|string|int $messageId = null,
    ) {
    }

    public static function fromReversalId(string|int $reversalId): self
    {
        return new self(reversalId: $reversalId);
    }

    public static function fromMessageId(string|int $messageId): self
    {
        return new self(messageId: $messageId);
    }
}
