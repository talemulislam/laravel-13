<?php

namespace App\Services;

class NullFilter
{
    public function check(string $text): string
    {
        return "NullFilter: No filtering required.";
    }
}