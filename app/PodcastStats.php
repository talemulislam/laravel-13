<?php

namespace App;

use App\Services\AppleMusic;

class PodcastStats
{
    public function generate(AppleMusic $apple): array
    {
        return [
            'message' => 'Podcast statistics generated',
            'podcast' => $apple->findPodcast('123'),
        ];
    }
}
