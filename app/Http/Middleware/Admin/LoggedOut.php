<?php

namespace App\Http\Middleware\Admin;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class LoggedOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
