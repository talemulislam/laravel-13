<?php

namespace App\Models;

class Filter
{
    public function __construct(
        public string $name
    ) {
    }

    public function check(): string
    {
        return "Filter {$this->name} is checking...";
    }
}