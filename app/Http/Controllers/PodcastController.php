<?php
namespace App\Http\Controllers;

use App\Services\Transistor;

class PodcastController extends Controller
{
    public function __construct(
        protected Transistor $transistor
    ) {
    }

    public function show()
    {
        return $this->transistor->getPodcast();
    }
}