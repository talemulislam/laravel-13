<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class UserController extends Controller
{
    public function showProfile(string $id): View
    {
        $user = Cache::get('user:' . $id);

        return view('profile', ['user' => $user]);
    }
}
