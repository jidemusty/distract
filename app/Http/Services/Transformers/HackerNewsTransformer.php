<?php

namespace App\Http\Services\Transformers;

class HackerNewsTransformer extends TransformerAbstract
{
    public function transform($payload)
    {
        return [
            'title' => $payload->title,
            'link' => isset($payload->url) ? $payload->url : 'https://news.ycombinator.com/item?id=' . $payload->id,
            'timestamp' => $payload->time,
            'service' => 'Hacker News'
        ];
    }
}