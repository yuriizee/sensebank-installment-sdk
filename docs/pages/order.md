# Order

This page demonstrates usage of order APIs.

## Create

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

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

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\CreateOrderResponse {
    statusCode: "IN_PROCESSING"
    statusText: "Замовлення в обробці!"
    httpStatus: 200
    messageId: "116D109CEC3F5CBAE0639B5A8F0A1615"
    orderId: "626254646"
} 
```

## Cancel

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CancelOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = new CancelOrderRequest(
    cancelId: '626254646',
    orderId: '626254646'
);

$response = $sdk->order()->cancelOrder($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\CancelOrderResponse {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: null
    orderId: "626254646"
} 
```

## Confirm

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ConfirmOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = new ConfirmOrderRequest(
    orderId: '626254646'
);

$response = $sdk->order()->confirmOrder($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\ConfirmOrderResponse {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: null
    orderId: "626254646"
}
```

## Reversal

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = new ReversalOrderRequest(
    orderId: '626254646',
    reversalId: '626254646',
    reversalSum: 50000,
    callBackURL: 'https://example.local'
);

$response = $sdk->order()->reversalOrder($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\ReversalOrderResponse {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: ""
    reversalId: "626254646"
}
```

## Check reversal

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CheckReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = new CheckReversalOrderRequest(
    orderId: "626254646",
    reversalSum: 50000,
);

$response = $sdk->order()->checkReversal($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\CheckReversalOrderResponse {
    statusCode: "CHECK_REVERSAL_IS_OK"
    statusText: "'Возврат по заказу с номером 626254646 на сумму 50000 возможен."
    httpStatus: 200
    orderId: "626254646"
}
```

## Get reversal

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = GetReversalOrderRequest::fromReversalId(626254646);

$response = $sdk->order()->getReversal($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\GetReversalOrderResponse {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: ""
    reversalId: "626254646"
} 
```

## Get Order Info

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Enums\OrderLimits;
use Yuriizee\SenseBankInstallmentSDK\Helper\Money;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = GetOrderRequest::fromOrderId(orderId: 626254646);

$response = $sdk->order()->getOrder($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Order\GetOrderResponse^ {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: ""
    orderId: "626254646"
    mPhone: null
    panEnd: null
    orderSum: null
    orderTerm: null
    shopId: null
    orderNom: null
    orderAdd: null
}
```
