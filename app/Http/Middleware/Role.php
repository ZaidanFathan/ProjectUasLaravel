<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check()) {
            $roles = explode('-', $role);
            foreach ($roles as $group) {
                if (Auth::user()->role == $group) {
                    return $next($request);
                }
            }
        }
        return redirect('/')->with('error', 'Unauthorized Access');
    }
}
