<?php

declare(strict_types=1);

use Yuriizee\SenseBankInstallmentSDK\Client;
use Yuriizee\SenseBankInstallmentSDK\Config;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

require __DIR__ . '/../vendor/autoload.php';

$config = new Config(
    url: 'https://retailapi.sensebank.com.ua:8243/api/PartnerInstallment/v1.0/',
    partnerId: 'partner',
    password: '!PaRt_Ne09_R#'
);
/**
 * You can create instance with own Psr\Http\Client\ClientInterface implemented class
 */
$client = (new Client($config))->getClient();

$sdk = InstallmentSDK::getInstance($config, $client);

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
