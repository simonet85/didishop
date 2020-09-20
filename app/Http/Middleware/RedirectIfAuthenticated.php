<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
            case 'admin':
                # admin 
                if (Auth::guard($guard)->check()) {
                    return redirect('/admin/dashboard');
                }
        
                break;
            
            default:
                # front end
                if (Auth::guard($guard)->check()) {
                    return redirect('/user/profil');
                }
                break;
        }

      
        return $next($request);
    }
}
