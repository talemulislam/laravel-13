<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\TestController;

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