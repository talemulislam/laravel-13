<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThumbnailController extends Controller
{
     public function show(string $photo)
    {
        return "Thumbnail for photo: " . $photo;
    }

    public function create(string $photo)
    {
        return "Create thumbnail for photo: " . $photo;
    }

    public function store(Request $request, string $photo)
    {
        return "Thumbnail created for photo: " . $photo;
    }
}
