<?php

use Ksakharov\CryptoCurrencyConverter\Controllers\Coins\Coins;
use Ksakharov\CryptoCurrencyConverter\Controllers\Logger\FileLogger;

require_once '../vendor/autoload.php';

?>

<?php if (strcmp($_SERVER['REDIRECT_URL'], '/') !== 0) { ?>
<div style="margin-bottom: 30px">
    <a href="/"><- Назад</a>
</div>
<?php } ?>

<code>
    <pre>
<?php
$coins = new Coins(new FileLogger('../tmp/log.txt'));

if (strcmp($_SERVER['REDIRECT_URL'], '/get_coins') === 0) {
    var_dump($coins->getCoins($_GET['limit']));
    return;
}

if (strcmp($_SERVER['REDIRECT_URL'], '/get_coin') === 0) {
    var_dump($coins->getCoinById($_GET['id']));
    return;
}

if (strcmp($_SERVER['REDIRECT_URL'], '/convert_coin') === 0) {
    var_dump($coins->convertCoin($_GET['from'], $_GET['to'], $_GET['amount']));
    return;
}

?>
    </pre>
</code>

<div style="display: flex; gap: 30px">
    <a href="/get_coins?limit=10">Get All Coins</a>
    <a href="/get_coin?id=btc-bitcoin">Get Coin</a>
    <a href="/convert_coin?from=btc-bitcoin&to=eth-ethereum&amount=2">Convert</a>
</div>
