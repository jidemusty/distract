<?php

namespace App\Http\Services;

use App\Http\Services\Transformers\HackerNewsTransformer;
use App\Http\Services\Transformers\ProductHuntTransformer;
use App\Http\Services\Transformers\RedditTransformer;
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
            return $this->sortResponseByTimestamp(
                $this->{$service}($limit)
            );
        }
    }

    protected function hackernews($limit = 10)
    {
        $data = (new HackerNews($this->client))->get($limit);

        return (new HackerNewsTransformer($data))->create();
    }

    protected function reddit($limit = 10)
    {
        $data = (new Reddit($this->client))->get($limit);

        return (new RedditTransformer($data))->create();

    }

    protected function producthunt($limit = 10)
    {
        $data = (new ProductHunt($this->client))->get($limit);

        return (new ProductHuntTransformer($data))->create();

    }

    protected function sortResponseByTimestamp(array $data)
    {
        usort($data, function ($a, $b) {
            return $a['timestamp'] - $b['timestamp'];
        });

        return $data;
    }
}