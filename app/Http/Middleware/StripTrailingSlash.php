<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StripTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET')) {
            $path = $request->getPathInfo();

            if ($path !== '/' && str_ends_with($path, '/')) {
                $newPath = rtrim($path, '/');
                $query = $request->server->get('QUERY_STRING');

                return redirect($query ? "{$newPath}?{$query}" : $newPath, 301);
            }
        }

        return $next($request);
    }
}
