<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

class VideoController extends Controller
{
    public function __construct(
        protected Filesystem $filesystem
    ) {}

    public function test()
    {
        $this->filesystem->put(
            'video-test.txt',
            'This was created by VideoController'
        );

        return 'Video file created';
    }
}
