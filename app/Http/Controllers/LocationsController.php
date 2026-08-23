<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationsController extends Controller
{
    public function show(Location $location)
    {
        return "Location: " . $location->name;
    }

    public function index()
    {
        return "Locations index";
    }
}
