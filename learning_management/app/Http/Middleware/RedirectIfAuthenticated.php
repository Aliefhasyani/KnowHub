<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
              
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return redirect('/admin');
                } elseif ($role === 'teacher') {
                    return redirect('/teacher');
                } elseif ($role === 'student') {
                    return redirect('/homepage');
                }
            }
        }
    
        return $next($request);
    }
    
}
