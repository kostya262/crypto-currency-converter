<?php

namespace Ksakharov\CryptoCurrencyConverter\Controllers\Logger;

use Cassandra\Date;
use Ksakharov\CryptoCurrencyConverter\Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface {

    private string $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function log($text) {
        $text = '[' . \date("F j, Y, g:i a") . '] ' . json_encode($text) . PHP_EOL;
        file_put_contents($this->file, $text, FILE_APPEND);
    }
}