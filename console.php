<?php

use Ksakharov\CryptoCurrencyConverter\Controllers\Coins\Coins;
use Ksakharov\CryptoCurrencyConverter\Controllers\Logger\ConsoleLogger;

require_once "vendor/autoload.php";

function convert($argv) {
    $coins = new Coins(new ConsoleLogger());
    if (count($argv) < 5) {
        echo 'Few arguments';
        return;
    }
    $coins->convertCoin($argv[2], $argv[3], $argv[4]);
}

function get_coins($argv) {
    $coins = new Coins(new ConsoleLogger());
    $coins->getCoins($argv[2]);
}

function get_coin($argv) {
    $coins = new Coins(new ConsoleLogger());
    if (count($argv) < 3) {
        echo 'Few arguments';
        return;
    }
    $coins->getCoinById($argv[2]);
}

function_exists($argv[1]) AND call_user_func($argv[1], $argv);
