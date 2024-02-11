<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    public function handle($request, Closure $next)
    {
        if (null === $request->header('X-API-Key' !== md5('API E-Nabung'))) {
            return response()->json([
                'code' => 403,
                'message' => 'Access denied. X-API-Key header is missing',
                'data' => null
            ]);
        }

        return $next($request);
    }
}
