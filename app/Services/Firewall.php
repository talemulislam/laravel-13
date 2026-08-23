<?php

namespace App\Services;

use App\Models\Filter;

class Firewall
{
    protected array $filters;

    public function __construct(
        protected Logger $logger,
        Filter ...$filters
    ) {
        $this->filters = $filters;
    }

    public function run(): void
    {
        $this->logger->log('Firewall started.');

        foreach ($this->filters as $filter) {
            echo $filter->check() . "<br>";
        }
    }
}