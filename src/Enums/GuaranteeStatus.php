<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

enum GuaranteeStatus
{
    case NO_PARTNERID;
    case NO_IDS;
    case NO_APP;
    case GUARANTEE_IS_FAIL;
    case GUARANTEE_IS_OK;
    case GUARANTEE_MAIL_OK;
    case GUARANTEE_IS_EMPTY;

    public function description(): string
    {
        return self::getDescription($this);
    }

    public static function getDescription(self $value): string
    {
        return match ($value) {
            self::NO_PARTNERID => 'Партнер ${partnerId} не зареєстрований у системі!',
            self::NO_IDS => 'Не передано ідентифікатор замовлення',
            self::NO_APP => 'Замовлення не знайдено',
            self::GUARANTEE_IS_FAIL => 'За замовленням ${orderId}|${messageId} відправка Гарантійного листа неможлива!',
            self::GUARANTEE_IS_OK => 'Повторно відправлено Гарантійний лист!',
            self::GUARANTEE_MAIL_OK => 'Відправлено Гарантійний лист на e-mail',
            self::GUARANTEE_IS_EMPTY => 'Під час формування Гарантійного листа виникла помилка! Спробуйте пізніше',
        };
    }
}
