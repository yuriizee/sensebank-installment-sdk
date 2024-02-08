<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

final class Client
{
    private ClientInterface $client;

    public function __construct(
        private readonly Config $config
    ) {
        $this->client = $this->configureClient();
    }

    public function getClient(): ClientInterface
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
            'base_uri' => $this->config->getUrl(),
            'handler' => $handlerStack,
            'auth' => [$this->config->getPartnerId(), $this->config->getPassword()],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }
}
