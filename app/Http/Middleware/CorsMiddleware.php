<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin', env('CORS_ORIGIN', '*'));
        $response->headers->set('Access-Control-Allow-Methods', env('CORS_METHODS', 'POST, GET, OPTIONS, PUT, DELETE'));
        $response->headers->set('Access-Control-Allow-Headers', env('CORS_HEADERS', 'Content-Type, Authorization, X-Requested-With'));
        $response->headers->set('Access-Control-Allow-Credentials', env('CORS_CREDENTIALS', 'true'));
        $response->headers->set('Access-Control-Max-Age', env('CORS_MAX_AGE', 60 * 60 * 24));

        return $response;
    }
}
