<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        $headers = [
            'Access-Control-Allow-Origin'      => env('CORS_ORIGIN', '*'),
            'Access-Control-Allow-Methods'     => env('CORS_METHODS', 'POST, GET, OPTIONS, PUT, DELETE'),
            'Access-Control-Allow-Credentials' => env('CORS_CREDENTIALS', 'true'),
            'Access-Control-Max-Age'           => env('CORS_MAX_AGE', 60 * 60 * 24),
            'Access-Control-Allow-Headers'     => env('CORS_HEADERS', 'Content-Type, Authorization, X-Requested-With'),
        ];

        if ($request->isMethod('OPTIONS'))
        {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $value)
        {
            $response->header($key, $value);
        }

        return $response;
    }
}
