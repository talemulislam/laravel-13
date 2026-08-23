<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;

class UploadController extends Controller
{
    public function __construct(
        protected Filesystem $filesystem
    ) {
    }

    public function index()
    {
        $files = $this->filesystem->files();

        return response()->json([
            'controller' => 'UploadController',
            'disk' => 's3',
            'files' => $files,
        ]);
    }
}