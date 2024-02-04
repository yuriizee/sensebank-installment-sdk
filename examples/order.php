<?php

declare(strict_types=1);

use Yuriizee\SenseBankInstallmentSDK\Config;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement\SendStatementRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

require __DIR__ . '/../vendor/autoload.php';

$config = new Config(
    url: 'https://retailapi.sensebank.com.ua:8243/api/PartnerInstallment/v1.0/',
    partnerId: 'partner',
    password: '!PaRt_Ne09_R#'
);

$sdk = InstallmentSDK::getInstance($config);

$request = new CreateOrderRequest(
    mPhone: '+380670000000',
    panEnd: '0000',
    orderId: rand(),
    orderSum: Money::toKopecks(
        rand(OrderLimits::MIN_SUM->value, OrderLimits::MAX_SUM->value)
    ),
    orderTerm: rand(2, 5),
    callBackURL: 'https://example.dev',
    eMailPartner: 'test@example.dev'
);

$response = $sdk->order()->createOrder($request);
dd($request, $response);

$request = new SendStatementRequest(
    partnerId: $config->getPartnerId(),
    account: 'UA713003460000026001015531701',
    dateFrom: '2022-06-06',
    dateTo: '2022-06-30',
    callBackURL: 'https://example.dev'
);
$response = $sdk->statement()->sendStatementTaskByAccount($request);

dd($request, $response);
