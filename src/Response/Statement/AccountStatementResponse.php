<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Statement;

use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class AccountStatementResponse extends BaseResponse
{
    public string|int $edrpou;
    public string $account;
    public string|int $partnerId;
    public string $fullNameClient;
    public string $taxId;
    public string $operType;
    public string $shopId;
    public string $orderDate;
    public string $orderTerm;
    public string $commission;
    public string $orderSum;
    public string $sendSum;
    public string $commissionSum;
}
