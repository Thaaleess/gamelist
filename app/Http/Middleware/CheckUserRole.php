<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {   
        if (Auth::check() && Auth::user()->role == $role || Auth::user() == null){
            return $next($request);
        } else {
            if (Auth::check() && Auth::user()->role !== $role){
                return back();
            }
        }
    }
}
