<?php

namespace App\Services;

// use Illuminate\Container\Attributes\Singleton;
// #[Singleton]
class Transistor
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
    
    // public function __construct(
    //     protected string $apiKey
    // ) {}

    // public function getApiKey(): string
    // {
    //     return $this->apiKey;
    // }

    // public string $message = 'Transistor was resolved';

    public function play(): string
    {
        return 'Transistor is playing';
    }
}

// class Transistor implements PodcastService
// {
//     public function findPodcast(string $id): array
//     {
//         return [
//             'id' => $id,
//             'title' => 'Laravel Podcast',
//             'source' => 'Transistor',
//         ];
//     }
// }
