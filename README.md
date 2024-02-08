# SenseBank Installment SDK

![build workflow](https://github.com/yuriizee/sensebank-installment-sdk/actions/workflows/php.yml/badge.svg)

This library provides a clean, flexible and robust way to integrate with the SenseBank Installment SDK. It wraps up various SDK features into easy-to-use PHP classes and methods, minimizing the effort required to interact with the SDK and improving the maintainability of your project.

## Installation
```bash
composer require yuriizee/sensebank-installment-sdk
```

## Features
Below are some features provided by this library:
* Order creation/cancellation (_Order class_)
* Statement management (_Statement class_)
* Managing guarantees (_Guarantee class_)
* Singleton client access (_InstallmentSDK class_)

## Requirements
* **PHP** >= 8.2

## API Documentation
[Link](https://sensebank.ua/partnerskiy-installment/) to detailed API documentation.

### Usage
```php
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

```

## License
SENSEBANK INSTALLMENT SDK PHP Library is open source software licensed under [MIT](https://github.com/yuriizee/sensebank-installment-sdk/blob/main/LICENSE)

## Config Class
Config class is used to set the configuration for the API client:
* url
* partnerId
* password

_**These parameters should be obtained directly from Sens Bank**_

## Contributing
Contributions are welcome! Please feel free to open issues for bug reports, feature requests or submit a pull request.

## Contact information
[yuriyzee@gmail.com](mail:yuriyzee@gmail.com)
