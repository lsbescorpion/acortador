<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header('Authorization') && $request->header('Authorization') == 'bGl1c3Zhbmk6bHNiYXJ6YWdh'){
            return $next($request);
        }

        return response()->json([
            'message' => 'Error 403 - ACCESO DENEGADO.',
        ]);
    }
}
