<?php

use Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement\SendStatementRequest;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;
use Yuriizee\SenseBankInstallmentSDK\Response\Statement\SendStatementResponse;

use function Pest\Faker\fake;

it('statements are successfully sent', function () {

    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = new SendStatementRequest(
        partnerId: fake()->iban(),
        account: fake()->iban(),
        dateFrom: fake()->date(),
        dateTo: fake()->date(),
        callBackURL: fake()->url()
    );
    $response = $installmentSDK->statement()->sendStatementTaskByAccount($request);

    $this->assertInstanceOf(SendStatementResponse::class, $response);
});
