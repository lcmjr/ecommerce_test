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

Route::get('/home','ProductController@show')->name('home');
Route::get('/','ProductController@show')->name('products');
Route::get('/categoria/{atualCategory}','CategoryController')->name('category');
Route::get('/produto/{product}','ProductController')->name('product');
Route::get('/produtos','ProductController@show');
Route::get('/pedido','OrderController')->name('order_close');
Route::post('/pedido','OrderController@registeringOrder')->name('order_close');
Route::get('/pedidos','OrderController@showOrders')->name('order_lists');
Route::get('/busca','ProductController@search')->name('search');
Route::get('/pedido/{order}','OrderController@showOrder')->name('order_detail');
Route::get('/carrinho/','CartController')->name('cart_add');
Route::get('/carrinho/adicionar/{product}','CartController@addToCart')->name('cart_add');
Route::get('/carrinho/remover/{product}','CartController@removeFromCart')->name('cart_remove');
