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
            $user = Contact::where('ContactFields_Email' ,$data['email'])->first();
            
            if(!is_null($user)){
               $login= Auth::attempt(['email' => $request->email, 'password' =>$request->password]);
                    if($login) {return redirect()->intended(RouteServiceProvider::HOME);}
                    else{ return redirect()->route('login')->withErrors(['name' =>"Email ou mot de passe incorrect " ]);}
            }
            return redirect()->route('login')->withErrors(['name' =>"Email ou mot de passe incorrect " ]);
    }

}
