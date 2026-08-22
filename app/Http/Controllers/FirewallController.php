<?php

namespace App\Http\Controllers;
use App\Firewall;

use Illuminate\Http\Request;

class FirewallController extends Controller
{
    public function test(Firewall $firewall)
    {
        return $firewall->test();
    }
}
