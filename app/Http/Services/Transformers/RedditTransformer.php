<?php

namespace App\Http\Services\Transformers;

class RedditTransformer extends TransformerAbstract
{
    public function transform($payload)
    {
        return [
            'title' => $payload->data->title,
            'link' => 'https://reddit.com' . $payload->data->permalink,
            'timestamp' => $payload->data->created_utc,
            'service' => 'Reddit'
        ];
    }
}