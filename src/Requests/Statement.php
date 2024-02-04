<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Requests;

use GuzzleHttp\RequestOptions;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Statement\SendStatementRequest;
use Yuriizee\SenseBankInstallmentSDK\Response\Statement\SendStatementResponse;

final class Statement extends BaseRequest
{
    public function sendStatementTaskByAccount(SendStatementRequest $request): SendStatementResponse
    {
        $request = $this->client->getClient()->post(
            'sendStatementTaskByAccount',
            [RequestOptions::JSON => $request->toArray()]
        );

        return new SendStatementResponse($request);
    }
}
