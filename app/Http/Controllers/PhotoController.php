<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

class PhotoController extends Controller
{
    public function __construct(
        protected Filesystem $filesystem
    ) {}

    public function test()
    {
        $this->filesystem->put(
            'photo-test.txt',
            'This was created by PhotoController'
        );

        return 'Photo file created';
    }
}
