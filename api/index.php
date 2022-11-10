<?php

use Ksakharov\CryptoCurrencyConverter\Controllers\Coins\Coins;
use Ksakharov\CryptoCurrencyConverter\Controllers\Logger\FileLogger;

require_once "../vendor/autoload.php";

$coins = new Coins(new FileLogger('../tmp/log.txt'));

if (strcmp($_SERVER['REDIRECT_URL'], '/api/get_coins') === 0) {
    echo json_encode($coins->getCoins($_GET['limit']));
    return;
}

if (strcmp($_SERVER['REDIRECT_URL'], '/api/get_coin') === 0 && !empty($_POST)) {
    echo json_encode($coins->getCoinById($_POST['id']));
    return;
}

if (strcmp($_SERVER['REDIRECT_URL'], '/api/convert_coin') === 0) {
    echo json_encode($coins->convertCoin($_GET['from'], $_GET['to'], $_GET['amount']));
    return;
}

echo json_encode('Not Found');

