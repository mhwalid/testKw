<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Ldap\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->connection = Container::getConnection('default');
        $this->middleware('guest:ldap_admin')->except('logout');
    }

    public function showLoginForm()
    {
      return view('auth.admin_login');
    }

    protected function credentials(Request $request)
    {
        return [
            'mail' => $request->email,
            'password' => $request->password,
            'fallback' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
        ];
    }

    public function login(Request $request)
    {
        if(Auth::guard('ldap_admin')->attempt($this->credentials($request))) {
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login')
                ->withErrors(['name' =>"Email ou mot de passe incorrect " ]);
        }
    }
}
