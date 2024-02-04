<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class SendStatementRequest extends DataObject
{
    public function __construct(
        public readonly string $partnerId,
        public readonly string $account,
        public readonly string $dateFrom,
        public readonly string $dateTo,
        public readonly string $callBackURL,
    ) {
    }
}
