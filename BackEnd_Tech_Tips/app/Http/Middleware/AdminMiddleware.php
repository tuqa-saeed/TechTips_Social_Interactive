<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'You are not authorized to access this resource'], 403);
        }

        return $next($request);
    }
}
