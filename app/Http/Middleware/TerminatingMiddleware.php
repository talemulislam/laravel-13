<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TerminatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('HANDLE:  middleware started');

         $response = $next($request);

        Log::info('HANDLE: middleware finished');

        return $response;
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
     public function terminate(Request $request, Response $response): void
    {
        Log::info('TERMINATE: middleware executed');
    }
}
