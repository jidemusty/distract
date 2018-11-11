<?php

namespace App\Http\Cache;

use Predis\Client as Predis;

class RedisAdapter
{
    protected $client;

    public function __construct(Predis $client)
    {
        $this->client = $client;
    }

    public function put($key, $value, $minutes = 10)
    {
        return $this->client->setex($key, (int) $minutes * 60, $value);
    }

    public function get($key)
    {
        return $this->client->get($key);
    }

    public function remember($key, $minutes = 10, callable $callback)
    {
        if ($value = $this->get($key)) {
            return $value;
        }

        $this->put($key, $value = $callback(), $minutes);

        return $value;
    }
}