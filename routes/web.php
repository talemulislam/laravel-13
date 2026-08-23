<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocationsController;

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
//Real-time facades
Route::get('/test-podcast-publish', [
    PodcastController::class,
    'test',
]);

//Routing basic
Route::get('/greeting', function () {
    return 'Hello World';
});
//Redirect routes
Route::redirect('/here', '/there', 301);
Route::get('/there', function () {
    return 'You are now at /there';
});
//View routes
// Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
//Optional parameter routes
// Route::get('/user/{name?}', function (?string $name = null) {
//     return $name;
// });
// Route::get('/user/{name?}', function (?string $name = 'John') {
//     return $name;
// });
//Regular Expression Constraints
Route::get('/user/{name}', function (string $name) {
    return "Name: " . $name;
})->where('name', '[A-Za-z]+');

Route::get('/user/{id}', function (string $id) {
    return "ID: " . $id;
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function (string $id, string $name) {
    return "ID: $id, Name: $name";
})->where([
    'id' => '[0-9]+',
    'name' => '[a-z]+'
]);
//Encoded Forward Slashes routes
Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');
//Generating url to named routes
Route::get('/user/{id}/profile', function (string $id) {
    $url = route('profile', [
        'id' => 1,
        'photos' => 'yes',
        'sort' => 'latest',
        'page' => 2,
    ]);

    return $url;
})->name('profile');
//Controller route group
Route::controller(OrderController::class)->group(function () {
    Route::get('/order', 'index');
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});
//Subdomain Routing
Route::domain('{account}.laravel_doc.test')->group(function () {

    Route::get('/user/{id}', function (string $account, string $id) {
        return "Account: $account, User ID: $id";
    });

});
//Route Name Prefixes
Route::name('admin.')->group(function () {

    Route::get('/users', function () {
        return route('admin.users');
    })->name('users');

});
//Implicit Route Model Binding
Route::get('/locations', [LocationsController::class, 'index'])
    ->name('locations.index');

Route::get('/locations/{location:slug}', [LocationsController::class, 'show'])
    ->name('locations.view')
    ->missing(function () {
        return redirect()->route('locations.index');
    });
//Rate limiter in routes
Route::middleware('throttle:login')->post('/login', function () {
    return 'Login successful';
});
Route::get('/login-test', function () {
    return view('login-test');
});
//Defining Middleware
// Route::get('/home', function () {
//     return 'Home Page';
// });
// Route::get('/test', function () {
//     return 'Token is valid!';
// })->middleware('token');
//Middleware Groups
// Route::get('/test', function () {
//     return 'Route reached';
// });
//Terminable Middleware
Route::get('/test', function () {
    return 'Hello from the route!';
});
//Preventing CSRF requests
Route::get('/token', function (Request $request) {
    $sessionToken = $request->session()->token();

    $csrfToken = csrf_token();

    return [
        'session_token' => $sessionToken,
        'csrf_token' => $csrfToken,
        'same' => $sessionToken === $csrfToken,
    ];
});
//Origin Verification of CSRF
Route::view('/forgerytest','forgerytest');
Route::post('/test-forgery', function (Request $request) {
    return 'Request accepted!';
});








require __DIR__.'/settings.php';
