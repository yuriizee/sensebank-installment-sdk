<?php

use Yuriizee\SenseBankInstallmentSDK\Client;
use Psr\Http\Client\ClientInterface;

beforeEach(function () {
    $this->client = new Client($this->config);
});

test('the client can be instantiated', function () {
    $this->assertTrue($this->client instanceof Client);
});

test('getClient method should return an instance of ClientInterface', function () {
    $this->assertTrue($this->client->getClient() instanceof ClientInterface);
});