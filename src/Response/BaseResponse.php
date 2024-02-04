<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Response;

use Psr\Http\Message\ResponseInterface;

abstract class BaseResponse
{
    public string $statusCode;
    public string $statusText;
    public int $httpStatus = 0;

    public function __construct(?ResponseInterface $response = null)
    {
        if ($response) {
            $this->fromResponse($response);
            $this->httpStatus = $response->getStatusCode();
        }
    }

    protected function fromResponse(ResponseInterface $response): static|self
    {
        $data = json_decode($response->getBody()->getContents(), true);

        return $this->fromArray($data);
    }

    protected function fromArray(array $data): static
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $this->normalize($value);
            }
        }

        return $this;
    }

    private function normalize(mixed $value): mixed
    {
        return $value === 'null' ? null : $value;
    }
}
