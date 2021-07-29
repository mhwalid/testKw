<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Contact
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

        // if (Auth::guard('web')->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        if (is_null(Auth::user()->IdUser)) {
            return redirect(RouteServiceProvider::HOME)->with('error','Votre compte n\'a pas encore été validé');
        }

        return $next($request);
    }
}
