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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    //--------------------------------------------------------
    Route::get('/menu/food','MenuController@food');
    Route::post('/food/add','MenuController@createFood');
    //--------------------------------------------------------
    Route::get('/menu/drink','MenuController@drink');
    Route::post('/drink/add','MenuController@createDrink');
    //--------------------------------------------------------
    Route::get('/order','OrderController@index');
    Route::post('/order/add','OrderController@create');
    Route::get('/order/{id}/edit','OrderController@edit');
    Route::post('/order/{id}/update','OrderController@update');
    Route::get('/order/{id}/hapus','OrderController@delete');
    //--------------------------------------------------------
    Route::get('/payment','PaymentController@index')->name('payment');
    Route::post('/payment/data','PaymentController@store');
});
