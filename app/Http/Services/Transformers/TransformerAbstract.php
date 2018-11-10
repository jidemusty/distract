<?php

namespace App\Http\Services\Transformers;

abstract class TransformerAbstract
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    abstract public function transform($payload);

    public function create()
    {
        return array_map(function ($item) {
            return $this->transform($item);
        }, $this->data);
    }
}