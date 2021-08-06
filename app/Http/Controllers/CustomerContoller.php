<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order\Order;
use App\Models\Order\OrderLine;
use App\Models\User;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CustomerContoller extends Controller
{
        public function index(){
        //    $Custmers= Contact::find('E91B0213-EBCE-4CAB-B4C6-A9DE19E38180');
           $user = User::find(Auth::user()->id)->Orders()->orderBy('sysCreatedDate', 'DESC')->paginate(10);
            return  view('Customer.index' , compact('user')); 
        }

        public function show(Request $q){
               
                if (File::exists(public_path("Documents\\Factures\\".$q->DocumentNumber.".pdf"))) {
                        return response()->file(public_path("Documents\\Factures\\".$q->DocumentNumber.".pdf"));
                }else{
                        $exec ='C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /Database="C:\Users\walid\Documents\TEST_GESTION.ebp"  /exportPDF=SaleInvoice;"'.$q->DocumentNumber.'";"C:\laragon\www\testKw\public\Documents\\Factures\\'.$q->DocumentNumber.'.pdf";"6ba0611b-7352-4b1c-a548-7f287baadf90"';
                        exec($exec);
                        if(exec($exec)){
                                return response()->file(public_path("Documents\\Factures\\".$q->DocumentNumber.".pdf"));
                        }else{
                                redirect(Request::url());
                        } 
                }
                
            }


        public function file(){
               
               //return Storage::disk('local')->put('file.txt', 'Your content here');
           try {
                        // $attemptToWriteObject = DB::table('SaleDocument')->where('id', 'CE2F5111-806C-473F-95C1-B77D8CD6DE8A')->get();
                        //  $attemptToWriteArray = Item::find('01010000');
                        //  Storage::put('SaleDocument.txt', $attemptToWriteArray);
                        //Storage::put('SaleDocument.txt', $attemptToWriteObject);
                                return  exec(storage_path('app/cmd.bat'));
                } catch (\Exception $e) {
                        dd($e);
                }
        }

        public function conn(){
                //$rest=Order::all();
                // $blogModel = new Item();
                // $blogModel->setConnection('sqlsrv');
                // $find = $blogModel->first();
                //   $find;
                //  DB::connection('mysql')->select('select * from columns_prissv');
                //  return Db::table('columns_prissv')->get();

                return Item::count();
        }
}
