<?php

namespace App\Http\Services;

use GuzzleHttp\Client as Guzzle;

abstract class ServiceAbstract
{
    protected $client;

    public function __construct(Guzzle $client)
    {
        $this->client = $client;
    }

    abstract public function get($limit = 10);
}