<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


         if (auth()->user()->role_id != 1) {
             abort(403);
         }
         else

       //  auth()->user() //roles
        // return response()->json(auth()->user()->);
        return $next($request);
    }
}
