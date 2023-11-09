<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->can($request->route()->getName())) {
            return $next($request);
        }

        return redirect()->back()->withFlashDanger("You don't have permission to do that");
        abort(403, 'THIS ACTION IS UNAUTHORIZED.');
    }
}
