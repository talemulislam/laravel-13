<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('orders');
    }


    public function show(string $id)
    {
        return "Showing order: " . $id;
    }

    public function store()
    {
        return "Order stored";
    }
}
