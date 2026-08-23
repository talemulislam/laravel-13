<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/podcast', [PodcastController::class, 'show']);

// Route::get('/servicecontainer', function (Service $service) {
//     dd($service::class);
// });



Route::get('/podcasts/{id}', [PodcastController::class, 'show']);

require __DIR__.'/settings.php';

Route::get('/photo', [PhotoController::class, 'index']);

Route::get('/video', [VideoController::class, 'index']);

Route::get('/upload', [UploadController::class, 'index']);

Route::get('/test',[PhotoController::class,'test']);

Route::get('/report', [ReportController::class, 'index']);

Route::get('/report', [ReportController::class, 'index']);


Route::get('/firewall', [FirewallController::class, 'index']);

Route::get('/test', [TestController::class, 'test']);




Route::get('/set-cache', function () {
    Cache::put('key', 'Hello Laravel Cache!', 300);

    return 'Cache stored successfully!';
});

Route::get('/cache', function () {
    return Cache::get('key');
});

Route::get('/users', function () {
    return Response::json([
        'name' => 'Rahik',
        'email' => 'rahik@example.com',
    ]);
});


Route::get('/users', function () {
    return response()->json([
        [
            'id' => 1,
            'name' => 'Rahik',
            'email' => 'rahik@example.com',
        ],
        [
            'id' => 2,
            'name' => 'John',
            'email' => 'john@example.com',
        ],
        [
            'id' => 3,
            'name' => 'David',
            'email' => 'david@example.com',
        ],
    ]);
});