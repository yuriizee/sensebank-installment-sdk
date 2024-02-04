<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Enums;

enum OrderStatus
{
    case NO_PARTNERID;
    case NO_APP;
    case INVALID_REVERSALID;
    case NO_REVERSAL;
    case IN_PROCESSING;
    case MATCH_REVERSALID;
    case CARD_BLOCKED;
    case CARD_NOT_ACTIVE;
    case NO_ORDERID;
    case HAS_REV;
    case REV_MORE_PURCH;
    case REVERSAL_IS_OK;
    case MATCH_ORDERID;
    case INVALID_ORDERID;
    case INVALID_MPHONE;
    case INVALID_PANEND;
    case INVALID_ORDERSUM;
    case INVALID_ORDERTERM;
    case INVALID_CALLBACKURL;
    case ORDERSUM_EXCEEDS;
    case ORDERSUM_LOW;
    case PAC_NOT_SUCCESS;
    case PAC_IS_REVERSED;
    case PAC_DUP_COMPL;
    case PAC_DAY_LMT_EXC;
    case PAC_AMOUNT_EXT;
    case PAC_ERROR;
    case PAC_NOT_FOUND;
    case INVALID_EMAIL;
    case NO_CONTRAGENT_MPHONE;
    case NO_CARD_PANEND;
    case LOW_BALANCE;
    case INST_ALLOWED_FAIL;
    case NO_PRODUCT;
    case CHECK_SMS_ERROR;
    case PURCHASE_IS_FAIL;
    case PURCHASE_IS_FAIL_EX;
    case NO_IDS;
    case CLIENT_NO_SEND_SMS;
    case SYSTEM_ERROR;
    case FINAL_CANCEL_OK;
    case MORE_ORDERID;
    case REQUEST_NOT_MATCH;
    case INST_ALLOWED_OK;
    case CHECK_SMS_OK;
    case PURCHASE_IS_OK;
    case PRE_PURCHASE_IS_OK;
    case FINAL_ORDER_OK;
    case INVALID_CANCELID;
    case CANCEL_IS_OK;
    case CANCEL_AFTER_OK;
    case MORE_ORDER_ID;
    case CANCEL_IS_FAIL;
    case CONFIRM_IS_OK;

    public function description(): string
    {
        return self::getDescription($this);
    }

    public static function getDescription(self $value): string
    {
        return match ($value) {
            self::NO_PARTNERID => 'Партнер ${partnerId} не зареєстрований у системі!',
            self::NO_APP => 'Замовлення не знайдено!',
            self::INVALID_REVERSALID => 'Указано некоректний номер на повернення товару!',
            self::NO_REVERSAL => 'Повернення :reversalId за запитом з номером :orderId не можна обробити!',
            self::IN_PROCESSING => 'Замовлення в обробці!',
            self::MATCH_REVERSALID => 'Повернення з номером ${reversalId} вже існує!',
            self::CARD_BLOCKED => 'Повернення неможливе! Картку заблоковано!',
            self::CARD_NOT_ACTIVE => 'Повернення неможливе! Картка неактивна!',
            self::NO_ORDERID => 'Замовлення з номером ${orderId} не знайдено! Повернення за ним неможливе!',
            self::HAS_REV => 'За замовленням з номером ${orderId} вже є покупка або скасування!',
            self::REV_MORE_PURCH => 'Сума повернення ${reversalId} перевищує суму оригінальної покупки ${orderId}',
            self::REVERSAL_IS_OK => 'Повернення ${reversalId} замовлення з номером ${orderId} оброблено успішно',
            self::MATCH_ORDERID => 'Замовлення з номером ${orderId} вже існує!',
            self::INVALID_ORDERID => 'Указано некоректний номер замовлення!',
            self::INVALID_MPHONE => 'Указано некоректний номер телефону',
            self::INVALID_PANEND => 'Указано некоректний номер картки',
            self::INVALID_ORDERSUM => 'Указано некоректну суму розстрочки',
            self::INVALID_ORDERTERM => 'Указано некоректний строк розстрочки',
            self::INVALID_CALLBACKURL => 'Указано некоректний URL',
            self::ORDERSUM_EXCEEDS => 'Сума розстрочки перевищує допустиме значення в ${maxOrder} UAH',
            self::ORDERSUM_LOW => 'Сума розстрочки нижче допустимого значення в ${minOrder} UAH',
            self::PAC_NOT_SUCCESS => 'Транзакція Pre-authorization має неуспішний код завершення',
            self::PAC_IS_REVERSED => 'Транзакцію Pre-authorization скасовано',
            self::PAC_DUP_COMPL => 'Транзакція Pre-authorization має транзакцію завершення',
            self::PAC_DAY_LMT_EXC => 'Часовий інтервал між транзакціями предавторизації та завершення перевищує встановлену величину',
            self::PAC_AMOUNT_EXT => 'Сума транзакції завершення перевищує суму транзакції предавторизації більше, ніж на встановлену в процентах величину',
            self::PAC_ERROR => 'Помилка під час обробки правил транзакції предавторизації та завершення',
            self::PAC_NOT_FOUND => 'Для транзакції завершення не знайдено оригінальну транзакцію предавторизації',
            self::INVALID_EMAIL => 'Вказано некоректний email',
            self::NO_CONTRAGENT_MPHONE => 'Клієнта з номером телефону $ {contInf2Cellur} не знайдено',
            self::NO_CARD_PANEND => 'Картку за номером $ {card4Last} не знайдено',
            self::LOW_BALANCE => 'Недостатній баланс на картці',
            self::INST_ALLOWED_FAIL => 'За карткою ${card4Last} неможливо оформити розстрочку',
            self::NO_PRODUCT => 'Не знайдено продукт розстрочки',
            self::CHECK_SMS_ERROR => 'Неправильний код SMS!',
            self::PURCHASE_IS_FAIL, self::PURCHASE_IS_FAIL_EX => 'Покупка неуспішна! Замовлення не оформлено!',
            self::NO_IDS => 'Не передано ідентифікатор замовлення',
            self::CLIENT_NO_SEND_SMS => 'Клієнт не підтвердив розстрочку замовлення',
            self::SYSTEM_ERROR => 'Виникла системна помилка!',
            self::FINAL_CANCEL_OK => 'Обробка скасування замовлення з номером $ {orderId} успішна',
            self::MORE_ORDERID => 'За замовленням ${orderId} виявлено кілька записів!',
            self::REQUEST_NOT_MATCH => 'Запит не можна опрацювати. Перевірте статус замовлення',
            self::INST_ALLOWED_OK => 'За карткою ${card4Last} можлива розстрочка, триває перевірка',
            self::CHECK_SMS_OK => 'Перевірка коду SMS успішна!',
            self::PURCHASE_IS_OK, self::PRE_PURCHASE_IS_OK => 'Покупка успішна, відправлено Гарантійний лист!',
            self::FINAL_ORDER_OK => 'Товар видано клієнту',
            self::INVALID_CANCELID => 'Указано некоректний номер скасування!',
            self::CANCEL_IS_OK => 'Скасування замовлення за номером ${orderId} в обробці',
            self::CANCEL_AFTER_OK => 'Скасування замовлення неможливе! Скористайтеся операцією повернення',
            self::MORE_ORDER_ID => 'За замовленням ${orderId} виявлено кілька записів! Потрібен дод.параметр messageId!',
            self::CANCEL_IS_FAIL => 'Замовлення з номером $ {orderId} не вдалося скасувати',
            self::CONFIRM_IS_OK => 'Замовлення з номером ${orderId} підтверджено!',
        };
    }
}
