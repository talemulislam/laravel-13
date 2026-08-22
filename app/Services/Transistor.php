<?php

namespace App\Services;

class Transistor
{
    public function __construct(
        protected PodcastParser $parser
    ) {}

    public function getPodcast(string $title): string
    {
        return $this->parser->parse($title);
    }
}
