<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Order;

use Yuriizee\SenseBankInstallmentSDK\Enums\OrderStatus;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class CancelOrderResponse extends BaseResponse
{
    public ?string $messageId;
    public null|string|int $orderId = null;

    public function isSuccessStatus(): bool
    {
        return $this->statusCode === OrderStatus::IN_PROCESSING->name;
    }
}
