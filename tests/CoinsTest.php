<?php

use Ksakharov\CryptoCurrencyConverter\Controllers\Coins\Coins;
use Ksakharov\CryptoCurrencyConverter\Controllers\Logger\ConsoleLogger;
use PHPUnit\Framework\TestCase;

final class CoinsTest extends TestCase {

    private Coins $coins;

    public function setUp() : void {
        $this->coins = new Coins(new ConsoleLogger());
    }

    public function testConvertErrorCatch() {
        $this->assertEquals($this->coins->convertCoin(null, null, null), 'From param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('', '', ''), 'From param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('test', null, null), 'To param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('test', '', ''), 'To param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('test', 'test', null), 'Amount param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('test', 'test', ''), 'Amount param cannot be empty');
        $this->assertEquals($this->coins->convertCoin('test', 'test', 'test'), 'Amount param must be numeric');
    }

    public function testGetCoinsErrorCatch() {
        $this->assertEquals($this->coins->getCoins('test'), 'Limit must be a number');
    }

    public function testGetCoinErrorCatch() {
        $this->assertEquals($this->coins->getCoinById(null), 'Id cannot be null');
        $this->assertEquals($this->coins->getCoinById(''), 'Id cannot be null');
    }
}