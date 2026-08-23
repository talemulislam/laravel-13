<?php

namespace App\Services;

class ReportService
{
    public function __construct(
        private int $limit
    ) {
    }

    public function getLimit()
    {
        return $this->limit;
    }
}