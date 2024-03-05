# Guarantee

This page demonstrates usage of guarantee APIs.

## Get guarantee

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Guarantee\GetGuaranteeRequest;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = GetGuaranteeRequest::fromOrderId(1);
$response = $sdk->guarantee()->getGuarantee($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Guarantee\GetGuaranteeResponse {
    statusCode: "NO_APP"
    statusText: "Заказ не найден!"
    httpStatus: 200
    messageId: ""
    orderId: "5"
    guarantee: null
    base64Pdf: null
} 
```
