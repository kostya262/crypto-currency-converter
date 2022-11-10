<?php

namespace Ksakharov\CryptoCurrencyConverter\Controllers\Coins;

use Ksakharov\CryptoCurrencyConverter\Controllers\Fetcher\Fetcher;
use Ksakharov\CryptoCurrencyConverter\Interfaces\LoggerInterface;

class Coins {
    private LoggerInterface $logger;
    private Fetcher $fetcher;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
        $this->fetcher = new Fetcher();
    }

    public function getCoins($limit = null) {
        if (!empty($limit) && !is_numeric($limit)) return 'Limit must be a number';
        $output = $this->fetcher->get('https://api.coinpaprika.com/v1/coins');
        if (!empty($output)) {
            $output = $limit ? array_splice($output, 0, $limit) : $output;
            $coins = $this->parseCoins($output);
            $this->logger->log($coins);
            return $coins;
        }

        $this->logger->log('Error get coins');
        return 'Error get coins';
    }

    public function getCoinById($id) {
        if (empty($id)) return 'Id cannot be null';
        $output = $this->fetcher->get('https://api.coinpaprika.com/v1/coins/' . $id);
        if (!empty($output)) {
            $this->logger->log($output);
            return $output;
        }

        $this->logger->log('Error get coin');
        return 'Error get coin';
    }

    public function convertCoin($from, $to, $amount) {
        if (empty($from)) return 'From param cannot be empty';
        if (empty($to)) return 'To param cannot be empty';
        if (empty($amount)) return 'Amount param cannot be empty';
        if (!is_numeric($amount)) return 'Amount param must be numeric';
        $output = $this->fetcher->get('https://api.coinpaprika.com/v1/price-converter', [
            'base_currency_id' => $from,
            'quote_currency_id' => $to,
            'amount' => $amount,
        ]);
        if (!empty($output) && !empty($output->price)) {
            $price = $output->price;
            $this->logger->log($price);
            return $price;
        }

        $this->logger->log('Error convert coin');
        return 'Error convert coin';
    }

    private function parseCoins($coins): array {
        return array_map(function($coin) {
            return [$coin->symbol => $coin->name];
        }, $coins);
    }
}