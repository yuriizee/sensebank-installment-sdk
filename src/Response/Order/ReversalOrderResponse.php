<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Order;

use Yuriizee\SenseBankInstallmentSDK\Enums\OrderReversalStatus;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class ReversalOrderResponse extends BaseResponse
{
    public string|int $messageId;
    public string|int $reversalId;

    public function isSuccessStatus(): bool
    {
        return $this->statusCode === OrderReversalStatus::IN_PROCESSING->name;
    }
}
