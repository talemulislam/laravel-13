<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller
{
    public function showProfile(string $id): View
    {
        $user = Cache::get('user:' . $id);

        return view('profile', ['user' => $user]);
    }

     /**
     * Update the given user.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Update the user...

        return redirect('/users');
    }

    public function index()
    {
        return view('users');
    }
}

// class UserController implements HasMiddleware
// {
//     public static function middleware(): array
//     {
//         return [
//             'auth',

//             new Middleware('log', only: ['index']),

//             new Middleware('subscribed', except: ['store']),
//         ];
//     }

//     public function index()
//     {
//         return 'User index';
//     }

//     public function store()
//     {
//         return 'User store';
//     }

//     public function show()
//     {
//         return 'User show';
//     }
// }