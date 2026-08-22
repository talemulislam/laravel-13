<?php

namespace App\Services;

class AppleMusic
{
    public function findPodcast(string $id): array
    {
        return [
            'id' => $id,
            'title' => 'My Laravel Podcast',
            'description' => 'This podcast was returned by the AppleMusic service.',
        ];
    }
}
