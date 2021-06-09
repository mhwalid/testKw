<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {

     dd(App\Models\Family::with('subFamily')->whereHas('subFamily', function ($query) {
          $query->where('ItemFamilyId', 'LIKE', '%C%');
     })->get());
});

Route::get('/boutique', 'ItemController@index')->name('product.index');
Route::get('/boutique/Family/{Id}', 'ItemController@itembyCaption')->name('itembyCaption');
Route::get('/boutique/SubFamily/{subFamily}', 'ItemController@itembysubFamily')->name('itembysubFamily');
Route::get('/boutique/{Id}', 'ItemController@show')->name('product.show');
Route::post('/boutique/search', 'ItemController@search')->name('search');
Route::post('/Boutique', 'ItemController@filters')->name('filter');

//le panier
Route::get('/panier', 'Shop\CartController@index')->name('cart.index')->middleware('auth');
Route::post('/panier/ajouter', 'Shop\CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'Shop\CartController@destroy')->name('cart.destroy');
route::patch('/panier/{rowId}', 'Shop\CartController@update')->name('cart.update');

//destroy
Route::get('/destroy', function () {
     Cart::destroy();
});

// Checkout routes
Route::post('/paiement', 'Shop\CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'Shop\CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'Shop\CheckoutController@thanks')->name('checkout.thanks');



//Customers
Route::get('/customer', 'CustomerContoller@index')->name('Customer.index');
Route::get('/customer/{DocumentNumber}', 'CustomerContoller@show')->name('Customer.show');


//############ methode to writhe in folder #############################


Route::get('/file','CustomerContoller@file');
Route::get('/generate','Shop\CheckoutController@GenerateCommande');
Route::get('/image','ItemController@generateHtml');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
###################### test the connection #############

Route::get('/conn', 'CustomerContoller@conn');

//Item
Route::get('generate-feature/{Id}','ItemController@feature');

//Invoice
Route::get('generate-invoice/','Shop\CartController@invoice');

//Invoice
Route::get('/contact','ItemController@contact')->name('contact');



