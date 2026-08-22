<?php

namespace App\Services;

// use Illuminate\Container\Attributes\Singleton;

// #[Singleton]
class Transistor implements PodcastService
{
    // public function __construct(
    //     protected PodcastParser $parser
    // ) {}

    // public function getPodcast(string $title): string
    // {
    //     return $this->parser->parse($title);
    // }

    // public function getName(): string
    // {
    //     return 'Transistor Service';
    // }

    public function findPodcast(string $id): array
    {
        return [
            'id' => $id,
            'title' => 'Laravel Podcast',
            'source' => 'Transistor',
        ];
    }
}
