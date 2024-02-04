<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects\Product;

use Yuriizee\SenseBankInstallmentSDK\DataObjects\DataObject;

final class ProductData extends DataObject
{
    public function __construct(
        public readonly string $name,
        public readonly int $sum,
        public readonly int $vat = 0,
    ) {
    }
}
