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

Route::get('/', 'ItemController@home')->name('product.home');
Route::get('/boutique', 'ItemController@index')->name('product.index');
Route::get('/boutique/Family/{Id}', 'ItemController@itembyCaption')->name('itembyCaption');
Route::get('/boutique/{Id}', 'ItemController@show')->name('product.show');
Route::post('/boutique/search', 'ItemController@search')->name('search');
Route::post('/Boutiqu/Family/{Id}', 'ItemController@filters')->name('filter');
//le panier
// Route::get('/panier', 'Shop\CartController@index')->middleware('verified')->name('cart.index');
Route::get('/panier', 'Shop\CartController@index')->name('cart.index')->middleware(['auth','verified','contact']);
Route::post('/panier/ajouter', 'Shop\CartController@store')->name('cart.store')->middleware('auth');;
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

// Admin routes
Route::prefix('admin')->middleware('admin:ldap_admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/user', 'AdminController@showUser')->name('admin.user');
    Route::get('/banner', 'AdminController@banner')->name('admin.banner');
    Route::post('/banner/update' ,'AdminController@bannerUpdate')->name('admin.banner.update');
    Route::post('/banner/Update/{family}' ,'AdminController@familyBannerUpdate')->name('admin.banner.update.family');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
       Route::get('/ean', 'AdminController@ean')->name('admin.ean');
     Route::post('/product', 'AdminController@product')->name('admin.product');
     Route::post('/submitdata', 'AdminController@submitdata')->name('admin.submitdata');
    // Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    // Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');


    Route::get('/devalidation', 'AdminController@devalidationFactureShow')->middleware('direction')->name('admin.direction.devalidation.facture.show');
    Route::post('/devalidation/action', 'AdminController@devalidationFacture')->middleware('direction')->name('admin.direction.devalidation.facture');

    Route::get('/contact','AdminController@contactList')->name('admin.allContact');
    Route::patch('/contact/actif/{id}','AdminController@updateActiveContact')->name('admin.update.contact.actif');

    Route::get('/customer','AdminController@customerList')->name('admin.allCustomer');
    Route::patch('/customer/actif/{id}','AdminController@updateCustomer')->name('admin.update.customer');

    Route::get('/factures','AdminController@factureList')->name('admin.factures');


    //action on User
    Route::delete('/user/delete/{id}','AdminController@deleteUser')->name('admin.delete.user');
    Route::patch('/user/validate/{id}','AdminController@validateUser')->name('admin.validate.user');
    Route::post('/users/{id}', 'AdminController@resend')->name('admin.resend.user');
});

//Contact Client
Route::get('/compte','ContactController@index')->name('contact.index')->middleware(['auth','verified','contact']);
Route::post('/compte/update', 'ContactController@update')->name('contact.update')->middleware('auth');

Route::get('entreprise', 'ContactController@addContactShow')->middleware(['auth','verified','maincontact'])->name('contact.compagny');
Route::post('entreprise/addContact', 'ContactController@addContact')->middleware('maincontact')->name('contact.compagny.add.contact');

//Foreign Compagny
Route::post('/register/contact','MailController@foreignMail')->name('register.foreign');


//Customers
Route::get('/customer', 'CustomerContoller@index')->name('Customer.index');
Route::get('/customer/{DocumentNumber}', 'CustomerContoller@show')->name('Customer.show');


//############ methode to writhe in folder #############################


Route::get('/file','CustomerContoller@file');
Route::get('/generate','Shop\CheckoutController@GenerateCommande');
Route::get('/image','ItemController@generateHtml');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
###################### test the connection #############


//Item
Route::get('generate-feature/{Id}','ItemController@feature');
//Invoice
Route::get('generate-invoice/','Shop\CartController@invoice');

//Contact
Route::get('/contact','ItemController@contact')->name('contact');
Route::post('/contact/send','MailController@contacterMail')->name('contact.send');
Route::get('/orderMail','MailController@confirmOrderMail')->name('order.mail');
//Index
Route::get('/index','ItemController@index')->name('index');
//payement
Route::get('/payement','ItemController@payement')->name('payement');
//qui
Route::get('/Qui-Sommes-Nous','ItemController@qui')->name('qui');

//kw
Route::get('/kwInfo','ItemController@kw')->name('kw');
//certicifation
Route::get('/certification','ItemController@certification')->name('certification');
//mail
Route::get('/mail','ItemController@mail')->name('mail');

//test url
Route::get('/testmail', 'MailController@ordeR');

