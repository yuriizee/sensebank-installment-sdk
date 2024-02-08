<?php

use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CancelOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CheckReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ConfirmOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\InstallmentSDK;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CancelOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CheckReversalOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\ConfirmOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CreateOrderResponse;

use Yuriizee\SenseBankInstallmentSDK\Response\Order\GetOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\GetReversalOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\ReversalOrderResponse;

use function Pest\Faker\fake;

test('order are successfully created', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = new CreateOrderRequest(
        mPhone: fake()->phoneNumber(),
        panEnd: 0,
        orderId: fake()->randomDigit(),
        orderSum: fake()->randomDigit(),
        orderTerm: fake()->randomDigit(),
        callBackURL: fake()->url(),
        eMailPartner: fake()->email(),
        orderNom: [],
        orderAdd: '',
        orderVat: 0
    );
    $response = $installmentSDK->order()->createOrder($request);

    $this->assertInstanceOf(CreateOrderResponse::class, $response);
});

test('order are successfully canceled', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = new CancelOrderRequest(cancelId: fake()->randomDigit());
    $response = $installmentSDK->order()->cancelOrder($request);

    $this->assertInstanceOf(CancelOrderResponse::class, $response);
});

test('order are successfully confirmed', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = ConfirmOrderRequest::fromOrderId(fake()->randomDigit());
    $response = $installmentSDK->order()->confirmOrder($request);

    $this->assertInstanceOf(ConfirmOrderResponse::class, $response);
});

test('order are successfully reversing', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = new ReversalOrderRequest(
        orderId: fake()->randomDigit(),
        reversalId: fake()->randomDigit(),
        reversalSum: fake()->randomDigit(),
        callBackURL: fake()->url()
    );
    $response = $installmentSDK->order()->reversalOrder($request);

    $this->assertInstanceOf(ReversalOrderResponse::class, $response);
});

test('check reversal', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = new CheckReversalOrderRequest(
        orderId: fake()->randomDigit(),
        reversalSum: fake()->randomDigit(),
    );
    $response = $installmentSDK->order()->checkReversal($request);

    $this->assertInstanceOf(CheckReversalOrderResponse::class, $response);
});

test('get reversal', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = GetReversalOrderRequest::fromReversalId(fake()->randomDigit());
    $response = $installmentSDK->order()->getReversal($request);

    $this->assertInstanceOf(GetReversalOrderResponse::class, $response);
});

test('get order', function () {
    $installmentSDK = InstallmentSDK::getInstance($this->config, mockHTTP());
    $request = GetOrderRequest::fromOrderId(orderId: fake()->randomDigit());
    $response = $installmentSDK->order()->getOrder($request);

    $this->assertInstanceOf(GetOrderResponse::class, $response);
});
