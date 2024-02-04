<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Exceptions;

use Exception;

final class MissingParameters extends Exception
{
    public function __construct(
        string|array $parameters = []
    ) {
        $parameters = is_array($parameters) ? implode(', ', $parameters) : $parameters;

        parent::__construct(sprintf('Specify required parameters (%s)', $parameters));
    }
}
