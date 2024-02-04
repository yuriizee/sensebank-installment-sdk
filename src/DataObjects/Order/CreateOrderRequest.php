<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Order;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

/**
 * @property \Yuriizee\SenseBankInstallmentSDK\DataObjects\Product\ProductData[]|[] $orderNom
 */
final class CreateOrderRequest extends DataObject
{
    public string $shopId;

    public function __construct(
        public readonly string $mPhone,
        public readonly string|int $panEnd,
        public readonly string|int $orderId,
        public readonly string|int $orderSum,
        public readonly int $orderTerm,
        public readonly string $callBackURL,
        public readonly string $eMailPartner,
        public readonly array $orderNom = [],
        public readonly string $orderAdd = '',
        public readonly string|int $orderVat = 0,
    ) {
    }
}
