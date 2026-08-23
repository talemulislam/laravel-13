<?php

namespace App\Services;

class Logger
{
    public function log(string $message): void
    {
        echo "LOG: " . $message . "<br>";
    }
}