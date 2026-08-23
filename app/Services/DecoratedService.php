<?php

namespace App\Services;

class DecoratedService
{
    public function __construct(
        protected $service
    ) {
    }

    public function hello()
    {
        return $this->service->hello() . " + DecoratedService";
    }
}