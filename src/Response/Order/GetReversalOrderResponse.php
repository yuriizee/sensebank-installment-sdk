<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Order;

use Yuriizee\SenseBankInstallmentSDK\Enums\OrderReversalStatus;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class GetReversalOrderResponse extends BaseResponse
{
    public string|int $messageId;
    public string|int $reversalId;

    public function isSuccessStatus(): bool
    {
        return $this->statusCode === OrderReversalStatus::REVERSAL_IS_OK->name;
    }
}
