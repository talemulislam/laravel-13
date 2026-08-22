<?php

namespace App\Http\Controllers;

// use Illuminate\View\View;
// use App\Services\AppleMusic;

use App\Services\Transistor;

class PodcastController extends Controller
{
    // public function __construct(
    //     protected AppleMusic $apple,
    // ) {}

    // public function show(string $id): View
    // {
    //     return view('podcasts.show', [
    //         'podcast' => $this->apple->findPodcast($id),
    //     ]);
    // }


     public function __construct(
        protected Transistor $transistor
    ) {}

    public function show()
    {
        return $this->transistor->getPodcast(
            'My Laravel Podcast'
        );
    }
}
