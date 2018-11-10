<?php

namespace App\Http\Services;

use App\Http\Resources\HackerNewsResource;
use App\Http\Services\Transformers\HackerNewsTransformer;
use GuzzleHttp\Client as Guzzle;

class ServiceFactory
{
    protected $client;

    public function __construct(Guzzle $client)
    {
        $this->client = $client;
    }

    public function get($service, $limit = 10)
    {
        if (method_exists($this, $service)) {
            return $this->{$service}($limit);
        }
    }

    protected function hackernews($limit = 10)
    {
        $data = (new HackerNews($this->client))->get($limit);

        return (new HackerNewsTransformer($data))->create();
    }
}