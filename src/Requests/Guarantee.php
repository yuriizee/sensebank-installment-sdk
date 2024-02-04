<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Requests;

use GuzzleHttp\RequestOptions;
use Yuriizee\SenseBankInstallmentSDK\DataObjects\Guarantee\GetGuaranteeRequest;
use Yuriizee\SenseBankInstallmentSDK\Response\Guarantee\GetGuaranteeResponse;

final class Guarantee extends BaseRequest
{
    public function getGuarantee(GetGuaranteeRequest $request): GetGuaranteeResponse
    {
        $request = $this->client->getClient()->get(
            'getGuarantee/' . $this->client->getPartnerId(),
            [RequestOptions::QUERY => $request->toArray()]
        );

        return new GetGuaranteeResponse($request);
    }
}
