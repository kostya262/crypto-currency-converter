<?php

namespace Ksakharov\CryptoCurrencyConverter\Controllers\Logger;

use Ksakharov\CryptoCurrencyConverter\Interfaces\LoggerInterface;

class ConsoleLogger implements LoggerInterface
{
    public function log($text)
    {
        print_r($text);
    }
}