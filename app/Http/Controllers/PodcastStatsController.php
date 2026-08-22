<?php

namespace App\Http\Controllers;

use App\PodcastStats;

class PodcastStatsController extends Controller
{
      public function test()
    {
        $stats = app(PodcastStats::class);

        return app()->call([$stats, 'generate']);
    }
}
