<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class MainContact
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

        if (!is_null(Auth::user()) && !is_null(Auth::user()->IdUser) && Auth::user()->contact->IsMainInvoicing == "1") {
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME);


    }
}
