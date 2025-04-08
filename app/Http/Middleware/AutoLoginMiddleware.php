<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\RegisterUser;
class AutoLoginMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('customer')->check() && Cookie::has('auth_token')) {
            $user = RegisterUser::where('remember_token', Cookie::get('auth_token'))->first();

            if ($user) {
                Auth::guard('customer')->login($user);
            }
        }
        return $next($request);
    }
}
