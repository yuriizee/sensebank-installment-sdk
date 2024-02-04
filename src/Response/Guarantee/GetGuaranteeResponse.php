<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Guarantee;

use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class GetGuaranteeResponse extends BaseResponse
{
    public ?string $messageId;
    public null|string|int $orderId = null;
    public ?string $guarantee = null;
    public ?string $base64Pdf = null;
}
