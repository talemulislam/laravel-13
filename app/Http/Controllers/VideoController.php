<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;

class VideoController extends Controller
{
    public function __construct(
        protected Filesystem $filesystem
    ) {
    }

    public function index()
    {
        $files = $this->filesystem->files();

        return response()->json([
            'controller' => 'VideoController',
            'disk' => 's3',
            'files' => $files,
        ]);
    }
}