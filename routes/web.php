<?php
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/dangky', 'RegisterController@index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'],function(){
    //xu ly request gui len
    Route::post('/add_order_product', 'AdminController@add_order_product');
    Route::post('/add_product', 'AdminController@add_product');
    Route::post('/delete_order_product', 'AdminController@delete_order_product');
    Route::post('/order_succes', 'AdminController@order_succes');


});
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']],function(){
    //trang quan tri
    Route::get('/add_product_form', 'AdminController@add_product_form');
   
    Route::get('/account', 'AdminController@account');
    Route::get('/category', 'AdminController@category');
    Route::get('/product', 'AdminController@product')->name('all-product');

    Route::get('/', 'AdminController@index');
    Route::get('/order_product_succes_view', 'AdminController@order_product_succes_view');


});


Route::group(['prefix' => 'api'],function(){
    //du lieu tra ve
    Route::get('/product', 'ApiController@product');
    Route::get('/category', 'ApiController@category');
    Route::get('/order_product', 'ApiController@order_product');
    Route::get('/order_product_succes', 'ApiController@order_product_succes');


});
