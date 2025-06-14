<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if (Auth::user()->getRoleNames()->first() == $role) {
            return $next($request);
        }

        return redirect('/');

    }
}
