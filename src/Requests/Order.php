<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Requests;

use GuzzleHttp\RequestOptions;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CancelOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CheckReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ConfirmOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\CreateOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\GetReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Order\ReversalOrderRequest;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CancelOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CheckReversalOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\ConfirmOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\CreateOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\GetOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\GetReversalOrderResponse;
use Yuriizee\SenseBankInstallmentSDK\Response\Order\ReversalOrderResponse;

final class Order extends BaseRequest
{
    public function createOrder(CreateOrderRequest $request): CreateOrderResponse
    {
        $request = $this->http()->post(
            'createOrder/' . $this->getPartnerId(),
            [RequestOptions::JSON => $request->toArray()]
        );

        return new CreateOrderResponse($request);
    }

    public function cancelOrder(CancelOrderRequest $request): CancelOrderResponse
    {
        $request = $this->http()->post(
            'cancelOrder/' . $this->getPartnerId(),
            [RequestOptions::JSON => $request->toArray()]
        );

        return new CancelOrderResponse($request);
    }

    public function confirmOrder(ConfirmOrderRequest $request): ConfirmOrderResponse
    {
        $request = $this->http()->post(
            'confirmOrder/' . $this->getPartnerId(),
            [RequestOptions::JSON => $request->toArray()]
        );

        return new ConfirmOrderResponse($request);
    }

    public function reversalOrder(ReversalOrderRequest $request): ReversalOrderResponse
    {
        $request = $this->http()->post(
            'reversalOrder/' . $this->getPartnerId(),
            [RequestOptions::JSON => $request->toArray()]
        );

        return new ReversalOrderResponse($request);
    }

    public function checkReversal(CheckReversalOrderRequest $request): CheckReversalOrderResponse
    {
        $request = $this->http()->get(
            'checkReversal/' . $this->getPartnerId(),
            [RequestOptions::QUERY => $request->toArray()]
        );

        return new CheckReversalOrderResponse($request);
    }

    public function getReversal(GetReversalOrderRequest $request): GetReversalOrderResponse
    {
        $request = $this->http()->get(
            'getReversal/' . $this->getPartnerId(),
            [RequestOptions::QUERY => $request->toArray()]
        );

        return new GetReversalOrderResponse($request);
    }

    public function getOrder(GetOrderRequest $request): GetOrderResponse
    {
        $request = $this->http()->get(
            'getOrder/' . $this->getPartnerId(),
            [RequestOptions::QUERY => $request->toArray()]
        );

        return new GetOrderResponse($request);
    }
}
