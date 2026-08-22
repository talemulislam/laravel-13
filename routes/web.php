<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

// Route::get('/podcasts/{id}', [PodcastController::class, 'show']);

Route::get('/podcast', [PodcastController::class, 'show']);

require __DIR__.'/settings.php';
