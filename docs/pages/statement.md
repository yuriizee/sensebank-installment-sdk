# Statement

This page demonstrates usage of statement APIs.

## Send statement task

```php
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement\SendStatementRequest;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;

$sdk = InstallmentSDK::getInstance($config, $client);

$request = new SendStatementRequest(
    partnerId: 'partnerId',
    account: 'account',
    dateFrom: '2024-04-04',
    dateTo: '2024-04-04',
    callBackURL: 'https://examle.local'
);
$response = $sdk->statement()->sendStatementTaskByAccount($request);
```

**Example Output**

```php
Yuriizee\SenseBankInstallmentSDK\Response\Statement\SendStatementResponse {
    statusCode: ? string
    statusText: ? string
    httpStatus: 202
    messageId: ? string|int
    accountStatement: null
} 
```
