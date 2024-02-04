<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\DataObjects;

abstract class DataObject
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public static function fromArray(array $data): static
    {
        $properties = array_keys(get_class_vars(static::class));
        $existsData = array_filter(
            $data,
            static fn ($key) => in_array($key, $properties),
            ARRAY_FILTER_USE_KEY
        );

        return new static(...$existsData);
    }
}
