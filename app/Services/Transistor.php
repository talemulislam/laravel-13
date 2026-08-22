<?php
namespace App\Services;

class Transistor
{
    public function __construct(
        protected PodcastParser $parser
    ) {
    }

    public function getPodcast()
    {
        return $this->parser->parse();
    }
}

?>