<?php
// app/Services/WooCommerceService.php

namespace App\Services;

use GuzzleHttp\Client;


class WooCommerceService
{
    protected $apiUrl;
    protected $consumerKey;
    protected $consumerSecret;
    protected $client;

    public function __construct()
    {
        $this->apiUrl = config('woocommerce.api_url');
        $this->consumerKey = config('woocommerce.consumer_key');
        $this->consumerSecret = config('woocommerce.consumer_secret');
        echo '\n 1 url '.$this->apiUrl .'\n public '. $this->consumerKey.'\n secret'. $this->consumerSecret;
        $this->client = new Client();
    }

    public function getProducts()
    {
        echo '\n 2- url '.$this->apiUrl .'\n public '. $this->consumerKey.'\n secret'. $this->consumerSecret;
        $response = $this->client->get($this->apiUrl . 'products', [
            'auth' => [$this->consumerKey, $this->consumerSecret],
        ]);

        return json_decode($response->getBody(), true);
    }
}
