<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Order;

use Yuriizee\SenseBankInstallmentSDK\Enums\OrderStatus;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class GetOrderResponse extends BaseResponse
{
    private const SUCCESS_STATUSES = [
        OrderStatus::INST_ALLOWED_OK->name,
        OrderStatus::CHECK_SMS_OK->name,
        OrderStatus::PURCHASE_IS_OK->name,
        OrderStatus::PRE_PURCHASE_IS_OK->name,
        OrderStatus::FINAL_ORDER_OK->name,
    ];
    public ?string $messageId;
    public null|string|int $orderId = null;
    public ?string $mPhone = null;
    public ?string $panEnd = null;
    public ?string $orderSum = null;
    public ?string $orderTerm = null;
    public ?string $shopId = null;
    public ?string $orderNom = null;
    public ?string $orderAdd = null;

    public function isSuccess(): bool
    {
        return in_array($this->statusCode, self::SUCCESS_STATUSES);
    }
}
