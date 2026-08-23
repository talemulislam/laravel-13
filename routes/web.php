<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

use App\Services\Transistor;
use Psr\Container\ContainerInterface;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\TransistorController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PodcastStatsController;
use App\Http\Controllers\UserController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

// Route::get('/podcasts/{id}', [PodcastController::class, 'show']);

// Route::get('/podcast', [PodcastController::class, 'show']);
//Singleton Binding method
Route::get('/test-singleton', [PodcastController::class, 'test']);
//Singleton Binding using Attribute
Route::get('/test-transistor', [TransistorController::class, 'test']);
//Binding using Scoped method
Route::get('/test-scoped', [TransistorController::class, 'test']);
//Binding using Instance method
Route::get('/test-instance', [TransistorController::class, 'test']);
//Binding using Interface implementations
Route::get('/podcast', [PodcastController::class, 'show']);
//Contextual Binding
Route::get('/photo-test', [PhotoController::class, 'test']);
Route::get('/video-test', [VideoController::class, 'test']);
Route::get('/upload-test', [UploadController::class, 'test']);
//Primitive binding
Route::get('/test-primitive', [TransistorController::class, 'test']);
//Binding Typed Variadics
Route::get('/test-firewall', [FirewallController::class, 'test']);
//Tagging
Route::get('/test-reports', [ReportController::class, 'test']);
//Extending binding
Route::get('/test-service', [ServiceController::class, 'test']);
//Automatic Injection
Route::get('/podcast/{id}', [PodcastController::class, 'show']);
//Method invocation and Injection
Route::get('/podcast-stats', [PodcastStatsController::class, 'test']);
//Container events
Route::get('/test-resolving', [TransistorController::class, 'test']);
//PSR-11
Route::get('/', function (ContainerInterface $container) {
    $service = $container->get(Transistor::class);

    return $service->play();
});

//Facades
Route::get('/cache', function () {
    Cache::put('key', 'Hello from Laravel Cache!', 60);

    return Cache::get('key');
});
//Use of facades on a controller
Route::get('/profile/{id}', [UserController::class, 'showProfile']);
Route::get('/cache-user/{id}', function (string $id) {
    Cache::put('user:' . $id, [
        'id' => $id,
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ], 600);

    return 'User stored in cache.';
});





require __DIR__.'/settings.php';
