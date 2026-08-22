<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\TransistorController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

// Route::get('/podcasts/{id}', [PodcastController::class, 'show']);

// Route::get('/podcast', [PodcastController::class, 'show']);
Route::get('/test-singleton', [PodcastController::class, 'test']);
Route::get('/test-transistor', [TransistorController::class, 'test']);
Route::get('/test-scoped', [TransistorController::class, 'test']);
Route::get('/test-instance', [TransistorController::class, 'test']);
Route::get('/podcast', [PodcastController::class, 'show']);

require __DIR__.'/settings.php';
