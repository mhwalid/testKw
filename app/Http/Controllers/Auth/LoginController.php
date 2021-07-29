<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Password;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {

       $data=$request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

            if (Auth::attempt($data)) {
                // dd(Auth::user()->customer->ActiveState);
                if (is_null(Auth::user()->IdUser)) {
                    return redirect()->intended(RouteServiceProvider::HOME);
                }

                if (Auth::user()->contact->IsWebContact == "1" ) {
                    if (Auth::user()->customer->ActiveState == "0") {
                        return redirect()->intended(RouteServiceProvider::HOME);
                    }
                    auth()->logout();
                    return redirect()->route('login')->withErrors(['name' =>"Votre entreprise n'est pas active" ]);
                }
                auth()->logout();
                return redirect()->route('login')->withErrors(['name' =>"votre compte n'est pas activé" ]);
            }
            return redirect()->route('login')->withErrors(['name' =>"Email ou mot de passe incorrect" ]);

            //connexion via contact de sqlsvr (work in progress)
            // if (Auth::guard('unconfirmed')->attempt($data)) {
            //     return redirect()->intended(RouteServiceProvider::HOME);
            // }elseif (Auth::attempt($data)) {
            //     if (Auth::user()->IsWebContact == "1") {
            //             return redirect()->intended(RouteServiceProvider::HOME);
            //         }
            //         auth()->logout();
            //         return redirect()->route('login')->withErrors(['name' =>"votre compte n'est pas activé" ]);
            // }
            // return redirect()->route('login')->withErrors(['name' =>"Email ou mot de passe incorrect" ]);
    }

}
