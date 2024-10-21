<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableCsrf
{
    protected $except = [
        // Routes to exclude from CSRF verification
        '/getStoreProducts',
        '/getStoreCannedGoods',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current request path is in the except array
        if (in_array($request->path(), $this->except) && $request->isMethod('POST')) {
            // Bypass CSRF verification
            return $next($request);
        }

        // Otherwise, call the next middleware in the stack
        return $next($request);
    }
}
