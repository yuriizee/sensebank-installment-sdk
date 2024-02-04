<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Helper;

final class Money
{
    public static function toKopecks(int $sum): int
    {
        return $sum * 100;
    }
}
