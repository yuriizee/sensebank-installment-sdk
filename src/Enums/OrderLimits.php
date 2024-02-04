<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

use Yuriizee\SenseBankInstallmentSDK\Helper\Money;

enum OrderLimits: int
{
    case MIN_SUM = 500;
    case MAX_SUM = 200000;

    public function kopecks(): int
    {
        return self::getKopecks($this);
    }

    public static function getKopecks(self $value): int
    {
        return Money::toKopecks($value->value);
    }
}
