<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Ldap\Admin as ldapAdmin;

class Direction
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

        if (ldapAdmin::where('mail',Auth::user()->email)->first()->memberof[0] == "CN=Direction KWD,OU=Groupe raic,DC=RAIC,DC=local") {
            return $next($request);
        }

        return redirect()->route('admin.dashboard');
    }
}
