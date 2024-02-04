<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response\Statement;

use Psr\Http\Message\ResponseInterface;
use Yuriizee\SenseBankInstallmentSDK\Response\BaseResponse;

final class SendStatementResponse extends BaseResponse
{
    public string|int $messageId;
    public ?AccountStatementResponse $accountStatement = null;

    protected function fromResponse(ResponseInterface $response): self
    {
        $data = json_decode($response->getBody()->getContents(), true);

        if (! $data) {
            return new self();
        }

        if (isset($data['accountStatement'])) {
            $this->accountStatement = new AccountStatementResponse();
            $this->accountStatement->fromArray($data['accountStatement']);
            unset($data['accountStatement']);
        }

        return $this->fromArray($data);
    }
}
