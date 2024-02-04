<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

enum OrderReversalStatus
{
    case NO_PARTNERID;
    case NO_APP;
    case INVALID_REVERSALSUM;
    case NO_REVERSAL;
    case CARD_BLOCKED;
    case CARD_NOT_ACTIVE;
    case NO_ORDERID;
    case HAS_REV;
    case REV_MORE_PURCH;
    case CHECK_REVERSAL_IS_OK;
    case NO_IDS;
    case NO_REVERSALID;
    case INVALID_REVERSALID;
    case INVALID_CALLBACKURL;
    case IN_PROCESSING;
    case MATCH_REVERSALID;
    case REVERSAL_IS_OK;

    public function description(): string
    {
        return self::getDescription($this);
    }

    public static function getDescription(self $value): string
    {
        return match ($value) {
            self::NO_PARTNERID => 'Партнер ${partnerId} не зареєстрований у системі!',
            self::NO_APP => 'Замовлення не знайдено!',
            self::INVALID_REVERSALSUM => 'Указано некоректну суму повернення',
            self::NO_REVERSAL => 'Повернення :reversalId за запитом з номером :orderId не можна обробити!',
            self::CARD_BLOCKED => 'Повернення неможливе! Картку заблоковано!',
            self::CARD_NOT_ACTIVE => 'Повернення неможливе! Картка неактивна!',
            self::NO_ORDERID => 'Замовлення з номером ${orderId} не знайдено! Повернення за ним неможливе!',
            self::HAS_REV => 'За замовленням з номером ${orderId} вже є покупка або скасування!',
            self::REV_MORE_PURCH => 'Сума повернення ${reversalId} перевищує суму оригінальної покупки ${orderId}',
            self::CHECK_REVERSAL_IS_OK => 'Повернення замовлення з номером ${orderId} на суму ${reversalSum} можливе',
            self::NO_IDS => 'Не передано ідентифікатор замовлення',
            self::NO_REVERSALID => 'Поле з номером повернення (reversalId) не може бути порожнім!',
            self::INVALID_REVERSALID => 'Указано некоректний номер на повернення товару!',
            self::INVALID_CALLBACKURL => 'Указано некоректний URL',
            self::IN_PROCESSING => 'Повернення в обробці!',
            self::MATCH_REVERSALID => 'Повернення з номером ${reversalId} вже існує!',
            self::REVERSAL_IS_OK => 'Повернення ${reversalId} замовлення з номером ${orderId} оброблено успішно',
        };
    }
}
