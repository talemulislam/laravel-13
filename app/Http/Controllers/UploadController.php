<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

class UploadController extends Controller
{
    public function __construct(
        protected Filesystem $filesystem
    ) {}

    public function test()
    {
        $this->filesystem->put(
            'upload-test.txt',
            'This was created by UploadController'
        );

        return 'Upload file created';
    }
}
