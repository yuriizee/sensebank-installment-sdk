<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

enum StatementStatus
{
    case NO_PARTNERID;
    case INVALID_CALLBACKURL;
    case SYSTEM_ERROR;
    case NO_DATE;
    case NO_ACCOUNT;

    public function description(): string
    {
        return static::getDescription($this);
    }

    public static function getDescription(self $value): string
    {
        return match ($value) {
            self::NO_PARTNERID => 'Партнер ${partnerId} не зареєстрований в системі!',
            self::INVALID_CALLBACKURL => 'Вказано некоректний URL',
            self::SYSTEM_ERROR => 'Виникла системна помилка!',
            self::NO_DATE => 'Відсутня одна з дат фільтра',
            self::NO_ACCOUNT => 'Отсутствует номер счета партнера',
        };
    }
}
