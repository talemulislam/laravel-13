<?php

namespace App\Services;

interface PodcastService
{
    public function findPodcast(string $id): array;
}
