<?php

use Yuriizee\SenseBankInstallmentSDK\Exceptions\CannotUnSerialize;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;
use Yuriizee\SenseBankInstallmentSDK\Requests\Guarantee;
use Yuriizee\SenseBankInstallmentSDK\Requests\Order;
use Yuriizee\SenseBankInstallmentSDK\Requests\Statement;

test('Test Order Method', function () {
    $order = InstallmentSDK::getInstance($this->config, mockHTTP())->order();

    expect($order)->toBeInstanceOf(Order::class);
});

test('Test Guarantee Method', function () {
    $guarantee = InstallmentSDK::getInstance($this->config, mockHTTP())->guarantee();

    expect($guarantee)->toBeInstanceOf(Guarantee::class);
});

test('Test Statement Method', function () {
    $statement = InstallmentSDK::getInstance($this->config, mockHTTP())->statement();

    expect($statement)->toBeInstanceOf(Statement::class);
});

test('Should throw exception unserialization', function () {
    expect(fn () => InstallmentSDK::getInstance($this->config, mockHTTP())
        ->__wakeup())->toThrow(CannotUnSerialize::class);
});