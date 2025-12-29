<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) 
    {
        if(Auth::check() && Auth::user()->status == 'inactive'){
            Auth::logout();

            return redirect()->route('login')
                ->withErrors(['email' => 'Your Account is inactive']);
        }
        
        return $next($request);
    }
}
