<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerApiAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Auth Check:', [
            'user' => Auth::guard('customer')->user(),
            'authenticated' => Auth::guard('customer')->check(),
        ]);
        
        if (!Auth::guard('customer')->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized by Middleware'], 401);
        }
        return $next($request);
    }
}

