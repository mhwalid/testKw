<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
  public function store(Request $re)
  {

    $duplicata = Cart::search(function ($cartItem, $rowId) use ($re) {
      return $cartItem->id == $re->item_id;
    });
    if ($duplicata->isNotEmpty()) {
      return redirect()->route('product.index')->with('success', 'Le produit a déja été ajouté');
    }
    $item = Item::find($re->item_id);

    Cart::add($item->Id, $item->Caption, $re->quantity, $item->CostPrice)->associate('App\Models\Item');

    return redirect()->route('product.index')->with('success', 'Le produit a bien été ajouté');
  }


  public function index()
  {

    if (Cart::count() > 0) {
      return view('Cart.index');
    }
    return redirect()->route('product.index');
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

    if ($data['qty'] > $data['stock'] + $data['arrivage']) {
      Session::flash('error', 'Il n\'y a plus assez de stock.');
      return response()->json(['error' => 'Not Enought Product Quantity']);
    }


    Cart::update($rowId, $data['qty']);
    if ($data['qty'] > $data['stock']) {
      Session::flash('success', 'vous avez un ou des produits en arrivage ');
      return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }

    Session::flash('success', 'La quantité du produit est passée à ' . $data['qty'] . '.');
    return response()->json(['success' => 'Cart Quantity Has Been Updated']);
  }
}
