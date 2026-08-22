<?php

namespace App\Services;

class AppleMusic
{
    public function findPodcast(string $id): array
    {
        return [
            'id' => $id,
            'title' => 'My Laravel Podcast',
            'description' => 'This is a sample podcast.',
        ];
    }
}