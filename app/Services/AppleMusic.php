<?php

namespace App\Services;

use App\Models\Podcast;

class AppleMusic
{
    // public function findPodcast(string $id): array
    // {
    //     return [
    //         'id' => $id,
    //         'title' => 'My Laravel Podcast',
    //         'description' => 'This podcast was returned by the AppleMusic service.',
    //     ];
    // }

    // public function findPodcast(string $id): Podcast
    // {
    //     $podcast = new Podcast();

    //     $podcast->id = $id;
    //     $podcast->title = 'Laravel Podcast';
    //     $podcast->artist = 'Apple Music';

    //     return $podcast;
    // }

    public function findPodcast(string $id): array
    {
        return [
            'id' => $id,
            'title' => 'Laravel Podcast',
            'artist' => 'Apple Music',
        ];
    }
}
