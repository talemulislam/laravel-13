<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

// class UserController extends Controller
// {
//     public function showProfile(string $id): View
//     {
//         $user = Cache::get('user:' . $id);

//         return view('profile', ['user' => $user]);
//     }
// }

class UserController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',

            new Middleware('log', only: ['index']),

            new Middleware('subscribed', except: ['store']),
        ];
    }

    public function index()
    {
        return 'User index';
    }

    public function store()
    {
        return 'User store';
    }

    public function show()
    {
        return 'User show';
    }
}