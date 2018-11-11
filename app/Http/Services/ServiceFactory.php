<?php

namespace App\Http\Services;

use App\Http\Cache\RedisAdapter;
use App\Http\Services\Transformers\HackerNewsTransformer;
use App\Http\Services\Transformers\ProductHuntTransformer;
use App\Http\Services\Transformers\RedditTransformer;
use GuzzleHttp\Client as Guzzle;

class ServiceFactory
{
    protected $client;

    protected $cache;

    protected $enabledServices = [
        'hackernews',
        'reddit',
        'producthunt'
    ];

    public function __construct(Guzzle $client, RedisAdapter $cache)
    {
        $this->cache = $cache;
        $this->client = $client;
    }

    public function get($service, $limit = 10)
    {
        if (method_exists($this, $service) && $this->serviceIsEnabled($service)) {
            return $this->sortResponseByTimestamp(
                $this->{$service}($limit)
            );
        }

        return [];
    }

    protected function hackernews($limit = 10)
    {
        $data = $this->cache->remember('hackernews', 10, function () use ($limit) {
            return json_encode((new HackerNews($this->client))->get($limit));
        });

        return (new HackerNewsTransformer(json_decode($data)))->create();
    }

    protected function reddit($limit = 10)
    {
        $data = $this->cache->remember('reddit', 10, function () use ($limit) {
            return json_encode((new Reddit($this->client))->get($limit));
        });

        return (new RedditTransformer(json_decode($data)))->create();

    }

    protected function producthunt($limit = 10)
    {
        $data = $this->cache->remember('producthunt', 10, function () use ($limit) {
            return json_encode((new ProductHunt($this->client))->get($limit));
        });

        return (new ProductHuntTransformer(json_decode($data)))->create();

    }

    protected function serviceIsEnabled($service)
    {
        return in_array($service, $this->enabledServices);
    }

    protected function sortResponseByTimestamp(array $data)
    {
        usort($data, function ($a, $b) {
            return $a['timestamp'] - $b['timestamp'];
        });

        return $data;
    }
}