<?php

namespace App\Services;

use App\Contracts\Publisher;
use App\Models\Podcast;

class PodcastPublisher implements Publisher
{
    public function publish(Podcast $podcast): void
    {
        logger()->info('Podcast published', [
            'id' => $podcast->id,
        ]);
    }
}