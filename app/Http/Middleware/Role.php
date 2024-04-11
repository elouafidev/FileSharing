<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$Roles): Response
    {
        if (Auth::guest()) {
            abort(403);
        }
        $Roles =explode('|', $Roles);
        foreach($Roles as $Role){
            if($request->user()->hasRole($Role)){
                return $next($request);
            }
        }
        abort(403);
    }
}
