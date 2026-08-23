<?php

namespace App\Http\Controllers;

use App\Services\Transistor;

class TestController extends Controller
{
    public function test()
    {
        $transistor = app()->make(Transistor::class);

        return $transistor->start();
    }
}