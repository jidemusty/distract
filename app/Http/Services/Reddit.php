<?php

namespace App\Http\Services;

class Reddit extends ServiceAbstract
{
    public function get($limit = 10)
    {
        $response = $this->client->request('GET', 'https://www.reddit.com/r/popular.json?limit=' . $limit, [
            'headers' => ['User-Agent' => 'Distract']
        ]);

        return json_decode($response->getBody())->data->children;
    }
}