<?php

namespace App\Services;

class DecoratedService extends Service
{
    public function __construct(
        protected Service $service
    ) {}

    public function process(): string
    {
        return 'Decorated: ' . $this->service->process();
    }
}
