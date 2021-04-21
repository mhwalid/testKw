<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
  public function store(Request $re)
  {
    $url=session()->previousUrl();

    $duplicata = Cart::search(function ($cartItem, $rowId) use ($re) {
      return $cartItem->id == $re->item_id;
    });
    if ($duplicata->isNotEmpty()) {
      Session::flash('success', 'Le produit a déja été ajouté');
      return Redirect::to($url);
    }
    $item = Item::find($re->item_id);

    Cart::add($item->Id, $item->Caption, $re->quantity, $item->CostPrice)->associate('App\Models\Item');
    Session::flash('success', 'Le produit a  été ajouté');
    return Redirect::to($url);
  }


  public function index()
  {

    
      return view('Cart.index');
    
  }

  public function destroy($rowId)
  {
    Cart::remove($rowId);
    return redirect()->route('cart.index')->with('success', 'Le produit a été supprimé .');
  }

  public function update(Request $request, $rowId)
  {
    $data = $request->json()->all();
    $validates = Validator::make($request->all(), [
      'qty' => 'numeric|required',
    ]);

    if ($validates->fails()) {
      Session::flash('error', 'La quantité doit est comprise entre 1 et 5.');
      return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
    }

    if ($data['qty'] > $data['stock']){
      Session::flash('error', 'Il n\'y a plus assez de stock.');
      return response()->json(['error' => 'Not Enought Product Quantity']);
    }
    
    Session::flash('success', 'La quantité du produit est passée à ' . $data['qty'] . '.');
    Cart::update($rowId, $data['qty']);
    return response()->json(['success' => 'Cart Quantity Has Been Updated']);
  }
}
