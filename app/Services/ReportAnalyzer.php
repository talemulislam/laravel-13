<?php

namespace App\Services;

class ReportAnalyzer
{
    public function __construct(
        protected array $reports
    ) {
    }

    public function analyze()
    {
        foreach ($this->reports as $report) {
            echo $report->generate();
        }
    }
}