<?php

namespace App\Http\Controllers;

use App\Services\Service;

class ServiceController extends Controller
{
    public function test(Service $service)
    {
        return $service->process();
    }
}
