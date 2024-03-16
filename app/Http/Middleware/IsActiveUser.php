<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsActiveUser
{
      
    /**
     * handle
     *
     * @param  mixed $request
     * @param  mixed $next
     * @param  mixed $redirectToRoute
     * @return void
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (Auth::check() && Auth::user()->status != 1) {
            $reason =  Auth::user()->banned_reason; 
            
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('error', $reason ?? 'Your account is not active.');
        }

        return $next($request);


    }
}
