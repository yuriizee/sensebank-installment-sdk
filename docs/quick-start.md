# Quick start

This page shows you how to quickly work with the package.

## Install via composer

**Command**

````sh
composer require yuriizee/sensebank-installment-sdk
````

## Usage

**Command**

````php
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
    partnerId: 'partner', // You partner ID
    password: '!PaRt_Ne09_R#' // You password
);
/**
 * You can create instance with own Psr\Http\Client\ClientInterface implemented class
 */
$client = (new Client($config))->getClient();

$sdk = InstallmentSDK::getInstance($config, $client);

/** Create order example */
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
````

**Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\CreateOrderResponse {
    statusCode: "IN_PROCESSING"
    statusText: "Замовлення в обробці!"
    httpStatus: 200
    messageId: "116D109CEC3F5CBAE0639B5A8F0A1615"
    orderId: "626254646"
} 
```

## Official API documentation

Check out the documentation for the [Official API](https://sensebank.ua/partnerskiy-installment/).
