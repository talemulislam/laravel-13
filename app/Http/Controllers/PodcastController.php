<?php

namespace App\Http\Controllers;

// use Illuminate\View\View;

use App\Models\Podcast;
use App\Services\AppleMusic;
use App\Services\PodcastService;
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


    //  public function __construct(
    //     protected Transistor $transistor
    // ) {}

    // public function show()
    // {
    //     return $this->transistor->getPodcast(
    //         'My Laravel Podcast'
    //     );
    // }


    // public function show()
    // {
    //     $transistor = app(Transistor::class);

    //     return $transistor->getPodcast('Laravel Podcast');
    // }

    // public function test()
    // {
    //     $transistor1 = app(Transistor::class);

    //     $transistor2 = app(Transistor::class);

    //     if ($transistor1 === $transistor2) {
    //         return 'Same instance';
    //     }

    //     return 'Different instances';
    // }

    // public function show(PodcastService $podcastService)
    // {
    //     return $podcastService->findPodcast('123');
    // }

    public function __construct(
        protected AppleMusic $apple,
    ) {}

    public function show(string $id): Podcast
    {
        return $this->apple->findPodcast($id);
    }
}
