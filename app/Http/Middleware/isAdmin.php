<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!auth()->user()) {
            // return redirect()->intended('/admin');
        // } else if (auth()->user()->user_role == 2 || auth()->user()->user_role == 3){
            // return $next($request);
        // }
        if (!auth()->check()) {
            return redirect('/admin');
        }       

        if (auth()->user()->user_role == 2 || auth()->user()->user_role == 3) {
            return $next($request);
        }       

        return redirect('/admin')->withErrors(['role' => 'Permission Denied']);
    }
}
