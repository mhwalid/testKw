<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Mail\ForeignMail;
use App\Mail\ContacterMail;
use App\Mail\OrderMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForeignMail;
use App\Mail\ContacterMail;
use App\Mail\OrderMail;
use App\Notifications\InvoiceNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification ;

class MailController extends Controller
{
    public function foreignMail(Request $request)

    {
        Mail::to('test3@mailhog.local')->send(new ForeignMail($request));

        return redirect()->route('product.home')->with('success','Votre message a bien été envoyer');
    }

    public function contacterMail(Request $request)

    {
        Mail::to('test3@mailhog.local')->send(new ContacterMail($request));
        return redirect()->route('product.home')->with('success','Votre message a bien été envoyer');
    }

    public function confirmOrderMail(Request $request)
    {
        Mail::to('test3@mailhog.local')->send(new OrderMail($request));
        return redirect()->route('product.home')->with('success','Votre message a bien été envoyer');
    }
}

    public function testMail(){
        // Mail::to('mhwalid7@gmail.com' ,'Receiver Name')->send(new OrderMail());
        Notification::send(Auth::user(), new InvoiceNotification($products));

    }

    public function ordeR(){
        Mail::to(Auth::user()->email)->send(new OrderMail(Auth::user()->name));
    }
}


