<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function __construct(
        protected int $userId
    ) {
    }

    public function index()
    {
        return "User ID: " . $this->userId;
    }
    
     public function showProfile(string $id): View
    {
        $user = Cache::get('user:' . $id);

        return view('profile', ['user' => $user]);
    }
}