<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

enum CallbackStatus
{
    case NO_CONTRAGENT_MPHONE;
    case NO_CARD_PANEND;
    case LOW_BALANCE;
    case INST_ALLOWED_FAIL;
    case NO_PRODUCT;
    case SYSTEM_ERROR;
    case PURCHASE_IS_FAIL;
    case PURCHASE_IS_OK;
    case PRE_PURCHASE_IS_FAIL;
    case PRE_PURCHASE_IS_FAIL_EX;
    case PRE_PURCHASE_IS_OK;
    case PURCHASE_IS_FAIL_EX;
    case CLIENT_NO_SEND_SMS;

    public function description(): string
    {
        return self::getDescription($this);
    }

    public static function getDescription(self $value): string
    {
        return match ($value) {
            self::NO_CONTRAGENT_MPHONE => 'Клієнта з номером телефону ${contInf2Cellur} не знайдено',
            self::NO_CARD_PANEND => 'Картку за номером ${card4Last} не знайдено',
            self::LOW_BALANCE => 'Недостатній баланс на картці',
            self::INST_ALLOWED_FAIL => 'За карткою ${card4Last} неможливо оформити розстрочку',
            self::NO_PRODUCT => 'Не знайдено продукт розстрочки',
            self::SYSTEM_ERROR => 'Виникла системна помилка!',
            self::PURCHASE_IS_FAIL, self::PURCHASE_IS_FAIL_EX => 'Покупка неуспішна! Замовлення не оформлено!',
            self::PURCHASE_IS_OK => 'Покупка успішна, відправлено Гарантійний лист',
            self::PRE_PURCHASE_IS_FAIL, self::PRE_PURCHASE_IS_FAIL_EX => 'Блокування коштів неуспішне! Замовлення не оформлено!',
            self::PRE_PURCHASE_IS_OK => 'Успішне блокування коштів. Відправлено Гарантійній лист!',
            self::CLIENT_NO_SEND_SMS => 'Клієнт не підтвердив розстрочку замовлення',
        };
    }
}
