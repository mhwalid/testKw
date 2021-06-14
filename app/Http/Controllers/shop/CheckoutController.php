<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Item;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $rq)
    {
            // return $rq->exampleRadios;
        
        if (Cart::count() > 0) {
            $total = Cart::total();
            if($rq->exampleRadios=="carte"){
            return view('Checkout.index', compact('total'));

            }elseif($rq->exampleRadios=="virement"){
                $message ="Le RIB: 8785446843541546845241";
                return view('Checkout.index', compact('message'));
            }else{
                $message ="Pour valider votre commande merci de venir déposer un chèque en magasin";
                return view('Checkout.index', compact('message'));
            }

        }
        
        return redirect()->route('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        
        $handle = fopen('../storage/app/Commande.txt', "w+");
        $content ="Document - Date;Document - Code client;Document - Frais de port HT;Document - Référence;Document - Ligne - Code article;Document - Ligne - Quantité;Document - Ligne - PV HT;Document - Nom du client;Document - Numéro du document";
        $date = date('d/m/Y', time());
        $Client=Contact::find(Auth::user()->IdUser);
        $CodeClient=$Client->Custommer->Id;
        $Nom=$Client->ContactFields_Name;
      
        foreach (Cart::content() as $item) {
          $Article = Item::find($item->model->Id)->Id;
          $content .=utf8_decode("\n".$date .";".$CodeClient.";".$Article.";". $item->qty.";".$item->price.";".$Nom."BL50202848;");
        }
        file_put_contents('../storage/app/Commande.txt', $content, FILE_APPEND);
        fclose($handle);
        $exec = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\Cmd\cmd_Commande.txt"';
        exec($exec);
        Session::flash('success', 'Votre commande a été traitée avec succès');
        return view('Checkout.thankyou');
        Cart::destroy();

       
       
        // if ($this->notvalibel()) {
        //     Session::flash('error', 'la quantité existe plus dans le stock ');
        //     return response()->json(['success' => false], 400);
        // }
    //    return $data = $rq->json()->all();
    //     $this->updatestock();
    //     if ($this->updatestock()) {
    //         
    //     } else {
    //         
    //     }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function thankyou()
    {
        return Session::has('success') ? view('Checkout.thankyou') : redirect()->route('Cart.index');
    }

    private function updatestock()
    {
        foreach (Cart::content() as $item) {
            $product = Item::find($item->model->Id);
            // $product->RealStock = $product->RealStock - $item->qty;
            // $product->update();

            $updated = DB::table('item')
                ->where('id', $item->model->Id)
                ->update([
                    'RealStock' => $product->RealStock - $item->qty,
                ]);

            if ($updated) {
                return true;
            } else {
                return false;
            }
            // $product->update(['RealStock' => ($product->RealStock - $item->qty)]);
        }
    }


    private function notvalibel()
    {
        foreach (Cart::content() as $item) {
            $product = Item::find($item->model->Id);

            if ($product->RealStock < $item->qty) {
                return true;
            }
        }
        return false;
    }

    public function thanks()
    {
        return view('Checkout.thankyou');
    }
}
