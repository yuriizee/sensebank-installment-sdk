<?php

use Yuriizee\SenseBankInstallmentSDK\DataObjects\Guarantee\GetGuaranteeRequest;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;
use Yuriizee\SenseBankInstallmentSDK\Response\Guarantee\GetGuaranteeResponse;

use function Pest\Faker\fake;

it('garantee are successfully sent', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = GetGuaranteeRequest::fromOrderId(fake()->randomDigit());
    $response = $installmentSDK->guarantee()->getGuarantee($request);

    $this->assertInstanceOf(GetGuaranteeResponse::class, $response);
});
