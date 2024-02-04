<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Order;

use Yuriizee\SenseBankInstallmentSDK\Enums\OrderReversalStatus;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class CheckReversalOrderResponse extends BaseResponse
{
    public null|string|int $orderId = null;

    public function isSuccessStatus(): bool
    {
        return $this->statusCode === OrderReversalStatus::IN_PROCESSING->name;
    }
}
