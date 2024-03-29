<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Guarantee;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class GetGuaranteeRequest extends DataObject
{
    public function __construct(
        public readonly null|string|int $orderId = null,
        public readonly null|string|int $messageId = null,
    ) {
    }

    public static function fromOrderId(string|int $orderId): self
    {
        return new self(orderId: $orderId);
    }

    public static function fromMessageId(string|int $messageId): self
    {
        return new self(messageId: $messageId);
    }

    public static function fromBooth(string|int $orderId, string|int $messageId): self
    {
        return new self(orderId: $orderId, messageId: $messageId);
    }
}
