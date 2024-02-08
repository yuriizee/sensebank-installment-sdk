<?php

declare(strict_types=1);

namespace Yuriizee\SenseBankInstallmentSDK\Exceptions;

use Exception;

final class CannotUnSerialize extends Exception
{
    public function __construct()
    {
        parent::__construct('Cannot un serialize a singleton');
    }
}
