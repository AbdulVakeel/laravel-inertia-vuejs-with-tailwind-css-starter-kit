<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShouldHaveSubscription
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
        if (Auth::check() && !Auth::user()->subscriptions()->exists()) {
            return to_route('subscriber.investment')->with('error',  'Your are not Purchase Any Coin Package .');
        }

        return $next($request);
    }
}
