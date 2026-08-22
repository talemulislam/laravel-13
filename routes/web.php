<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\TransistorController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\ReportController;

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


require __DIR__.'/settings.php';
