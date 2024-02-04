<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;

final class Client
{
    private GuzzleClient $client;
    public function __construct(
        private readonly string $url,
        private readonly string|int $partnerId,
        private readonly string $password,
    ) {
        $this->client = $this->configureClient();
    }

    public function getPartnerId(): string|int
    {
        return $this->partnerId;
    }

    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    private function applyMiddleware(HandlerStack $handlerStack): void
    {
        $handlerStack->push(
            Middleware::mapRequest(static function (RequestInterface $request) {
                if ($request->getMethod() === 'POST') {
                    $request = $request->withHeader('Content-Type', 'application/json');
                }
                return $request;
            })
        );
    }

    private function configureClient(): GuzzleClient
    {
        $handlerStack = HandlerStack::create();
        $this->applyMiddleware($handlerStack);
        return new GuzzleClient([
            'base_uri' => $this->url,
            'handler' => $handlerStack,
            'auth' => [$this->partnerId, $this->password],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }
}
