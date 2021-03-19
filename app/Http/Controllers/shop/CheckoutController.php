<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return redirect()->route('Shop.store');
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
        Cart::destroy();
        Session::flash('success', 'Votre commande a été traitée avec succès');
        return response()->json(['success' => 'Payment Intent Succeeded']);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    private function updatestock()
    {
        foreach (Cart::content() as $item) {
            $product = Item::find($item->model->id);
            $product->update(['in_stock' => $product->RealStock - $item->qty]);
        }
    }


    private function notvalibel()
    {
        foreach (Cart::content() as $item) {
            $product = Item::find($item->model->id);

            if ($product->in_stock < $item->qty) {
                return true;
            }
        }
        return false;
    }
}
