<?php


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


     dd(App\Models\Family::with('subFamily')->whereHas('subFamily', function($query) {
          $query->where('ItemFamilyId', 'LIKE', '%C%');
  })->get());
  
});

Route::get('/boutique','ItemController@index')->name('product.index');

Route::get('/boutique/Family/{Id}','ItemController@itembyCaption')->name('itembyCaption');
Route::get('/boutique/SubFamily/{subFamily}','ItemController@itembysubFamily')->name('itembysubFamily');
Route::get('/boutique/{Id}','ItemController@show')->name('product.show');
Route::post('/boutique/search','ItemController@search')->name('search');
