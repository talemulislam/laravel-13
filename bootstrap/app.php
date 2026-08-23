<?php

use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\SubscribedMiddleware;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\First;
use App\Http\Middleware\Second;
use App\Http\Middleware\TerminatingMiddleware;
use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\HandleInertiaRequests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Http\Request;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Add middleware to the web group
        $middleware->web(append: [
            LogMiddleware::class,
            SubscribedMiddleware::class,
            TerminatingMiddleware::class,
            First::class,
            Second::class,
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
        //origin check
        $middleware->preventRequestForgery();

        // Middleware alias
        $middleware->alias([
            'token' => EnsureTokenIsValid::class,
            'log' => LogMiddleware::class,
            'subscribed' => SubscribedMiddleware::class,
        ]);

        // Cookie configuration
        $middleware->encryptCookies(
            except: ['appearance', 'sidebar_state']
        );
    })
    
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
