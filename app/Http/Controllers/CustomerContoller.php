<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerContoller extends Controller
{
        public function index(){
           $Custmers= Customer::all();
                
            return  view('Cutomer.index' , compact('Custmers'));
        }

        public function file(){
               
               //return Storage::disk('local')->put('file.txt', 'Your content here');
               
                try {
                        
                        $attemptToWriteObject = DB::table('SaleDocument')->where('id', 'CE2F5111-806C-473F-95C1-B77D8CD6DE8A')->get();
                         $attemptToWriteArray = Item::find('01010000');
                         Storage::put('array.txt', $attemptToWriteArray);
                        //Storage::put('SaleDocument.txt', $attemptToWriteObject);
                   } catch (\Exception $e) {
                        dd($e);
                   }
        }
}
