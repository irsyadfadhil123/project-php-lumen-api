<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Daftar origin yang diizinkan
        $allowedOrigins = [
            'https://fadhil.com',
            'http://localhost:3000', // kalau kamu lagi develop di lokal
        ];

        // Ambil origin dari request
        $origin = $request->headers->get('Origin');

        // Cek apakah origin diizinkan
        if (in_array($origin, $allowedOrigins)) {
            $allowOrigin = $origin;
        } else {
            $allowOrigin = null;
        }

        // Tangani preflight (OPTIONS)
        if ($request->getMethod() === "OPTIONS") {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', $allowOrigin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        // Response biasa
        $response = $next($request);
        if ($allowOrigin) {
            $response->headers->set('Access-Control-Allow-Origin', $allowOrigin);
            $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return $response;
    }
}
