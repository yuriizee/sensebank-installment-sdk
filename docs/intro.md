# Introducing

Introducing with the package.

## How use

```php
$config = new Config(...);
$client = (new Client($config))->getClient();
$sdk = InstallmentSDK::getInstance($config, $client);
```

::: info
You can create instance with own Psr\Http\Client\ClientInterface implemented class and use it for InstallmentSDK as a client.

When creating a Config instance, you should pass the base URL of the API, the partner ID and the password provided by the bank.
:::

After the InstallmentSDK is initialized, there are three main methods available to you to work with the API, namely:

| Methods     |
|-------------|
| order       |
| guarantee   |
| statement   |

::: warning
All child methods accept as a variable request - prepared objects of DTO.

And in response, they return prepared data transfer objects
:::

## Order requests

| Methods                             |                                Input parameter                                 |                                                                       Output |
|-------------------------------------|:------------------------------------------------------------------------------:|-----------------------------------------------------------------------------:|
| $sdk->order()->createOrder(...)     |     Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest      |          Yuriizee\SenseBankInstallmentSDK\Response\Order\CreateOrderResponse |
| $sdk->order()->cancelOrder(...)     |     Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CancelOrderRequest      |          Yuriizee\SenseBankInstallmentSDK\Response\Order\CancelOrderResponse |
| $sdk->order()->confirmOrder(...)    |     Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ConfirmOrderRequest     |         Yuriizee\SenseBankInstallmentSDK\Response\Order\ConfirmOrderResponse |
| $sdk->order()->reversalOrder(...)   |    Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ReversalOrderRequest     |        Yuriizee\SenseBankInstallmentSDK\Response\Order\ReversalOrderResponse |
| $sdk->order()->checkReversal(...)   |  Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CheckReversalOrderRequest  |   Yuriizee\SenseBankInstallmentSDK\Response\Order\CheckReversalOrderResponse |
| $sdk->order()->getReversal(...)     |   Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetReversalOrderRequest   |     Yuriizee\SenseBankInstallmentSDK\Response\Order\GetReversalOrderResponse |
| $sdk->order()->getOrder(...)        |       Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetOrderRequest       |             Yuriizee\SenseBankInstallmentSDK\Response\Order\GetOrderResponse |


## Guarantee requests

| Methods                              |                              Input parameter                               |                                                                   Output |
|--------------------------------------|:--------------------------------------------------------------------------:|-------------------------------------------------------------------------:|
| $sdk->guarantee()->getGuarantee(...) | Yuriizee\SenseBankInstallmentSDK\DataObjects\Guarantee\GetGuaranteeRequest | Yuriizee\SenseBankInstallmentSDK\Response\Guarantee\GetGuaranteeResponse |


## Statement requests

| Methods                              |                               Input parameter                               |                                                                    Output |
|--------------------------------------|:---------------------------------------------------------------------------:|--------------------------------------------------------------------------:|
| $sdk->statement()->getGuarantee(...) | Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement\SendStatementRequest | Yuriizee\SenseBankInstallmentSDK\Response\Statement\SendStatementResponse |

