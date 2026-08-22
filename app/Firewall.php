<?php

namespace App;
use App\Models\Filter;
use App\Services\Logger;

class Firewall
{
    protected $filters;

    public function __construct(
        protected Logger $logger,
        Filter ...$filters,
    ) {
        $this->filters = $filters;
    }

    public function test(): array
    {
        return [
            'logger' => get_class($this->logger),
            'filters' => array_map(
                fn (Filter $filter) => $filter->name,
                $this->filters
            ),
        ];
    }
}
