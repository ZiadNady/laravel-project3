<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // if (Auth::isAdmin($request)) {

      // return response()->json( [Auth::check(), auth()->user()->id, auth()->user()->role_id]);
         if (Auth::check() && auth()->user()->role_id == 1) {

             return $next($request);
         }
         else
         {

            abort(403);

         }

       //  auth()->user() //roles
      //   return response()->json(auth()->user());

    }
}
