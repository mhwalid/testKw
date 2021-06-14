<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {

        $data=$request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

            $admin = Admin::where('email' ,$data['email'])->first();

            if(!is_null($admin)){
               $login= Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>$request->password]);
                    if($login) {return redirect()->route('admin.dashboard');}
                    else{ return redirect()->route('admin.login')->withErrors(['name' =>"Email ou mot de passe incorrect " ]);}
            }
            return redirect()->route('admin.login')->withErrors(['name' =>"Email ou mot de passe incorrect" ]);


    }
}
