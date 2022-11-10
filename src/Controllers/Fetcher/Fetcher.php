<?php

namespace Ksakharov\CryptoCurrencyConverter\Controllers\Fetcher;

class Fetcher {
    public function get($link, $params = []) {
        $ch = curl_init($this->prepareLink($link, $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if (!empty($output)) {
            return json_decode($output);
        }

        curl_close($ch);
        return null;
    }

    private function prepareLink($link, $params): string {
        return $link . '?' . http_build_query($params);
    }
}