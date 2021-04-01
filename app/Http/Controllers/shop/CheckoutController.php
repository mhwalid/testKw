<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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


    public function index()
    {
        if (Cart::count() > 0) {
            $total = Cart::total();
            return view('Checkout.index', compact('total'));
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


        if ($this->notvalibel()) {
            Session::flash('error', 'la quantité existe plus dans le stock ');
            return response()->json(['success' => false], 400);
        }
        $data = $rq->json()->all();

        $this->updatestock();
        if ($this->updatestock()) {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès');
            return view('Checkout.thankyou');
        } else {
            return view('Checkout.index');
        }
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
