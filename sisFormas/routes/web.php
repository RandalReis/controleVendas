<?php

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
Route::resource('clientes','ClientesController');
Route::get('clientes','ClientesController@index')->name('clientes/index');

Auth::routes();

Route::resource('pedido','PedidoController');
Route::get('pedido','PedidoController@index')->name('pedido/index');

Route::resource('gastos','GastosController');
Route::get('gastos','GastosController@index')->name('gasto/index');


Route::get('/teste/{id}','ClientesController@teste');
Route::get('/home', 'HomeController@index')->name('home');
