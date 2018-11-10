<?php

namespace App\Http\Services\Transformers;

use Carbon\Carbon;

class ProductHuntTransformer extends TransformerAbstract
{
    public function transform($payload)
    {
        return [
            'title' => $payload->name,
            'link' => $payload->discussion_url,
            'timestamp' => Carbon::parse($payload->created_at, 'UTC')->getTimestamp(),
            'service' => 'Product Hunt'
        ];
    }
}