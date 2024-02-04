<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class ConfirmOrderRequest extends DataObject
{
    private function __construct(
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
