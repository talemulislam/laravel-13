<?php

namespace App\Http\Controllers;

use App\Services\Firewall;

class FirewallController extends Controller
{
    public function index(Firewall $firewall)
    {
        $firewall->run();

        return response()->json([
            'message' => 'Firewall completed'
        ]);
    }
}