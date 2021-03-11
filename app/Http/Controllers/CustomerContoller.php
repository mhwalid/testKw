<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerContoller extends Controller
{
        public function index(){
           $Custmers= Customer::all();
                
            return  view('Cutomer.index' , compact('Custmers'));
        }
}
