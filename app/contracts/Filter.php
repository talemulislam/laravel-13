<?php

namespace App\Contracts;

interface Filter
{
    public function check(string $text): string;
}