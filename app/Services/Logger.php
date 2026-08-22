<?php

namespace App\Services;

class Logger
{
    public function log(string $message): string
    {
        return "LOG: " . $message;
    }
}
