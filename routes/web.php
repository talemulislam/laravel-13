<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

 
// Route::get('/servicecontainer', function (Service $service) {
//     dd($service::class);
// });


Route::get('/podcasts/{id}', [PodcastController::class, 'show']);

require __DIR__.'/settings.php';
