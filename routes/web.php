<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

# call functions from this source (if "../products/.." in address)
Route::resource('/products', 'App\Http\Controllers\ProductController');
Route::resource('/users', 'App\Http\Controllers\UsersController');

Route::get('/register', 'App\Http\Controllers\RegistrationController@create');
Route::post('/register', 'App\Http\Controllers\RegistrationController@store');
Route::get('/shop', 'App\Http\Controllers\ProductController@index');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::put('/cart', [\App\Http\Controllers\CartController::class, 'put'])->name('cart.put');
Route::delete('/cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.removeItem');
Route::any('/cart/create', [\App\Http\Controllers\CartController::class, 'create'])->name('order.create');

Route::get('/login', 'App\Http\Controllers\SessionsController@create');
Route::post('/login', 'App\Http\Controllers\SessionsController@store');
Route::get('/logout', 'App\Http\Controllers\SessionsController@destroy');

Route::get('/all_orders', function () {
    $orders = \App\Models\Order::all();
    return view('orders.all', compact('orders'))
        ->with('orders', $orders);
});
Route::get('/orders', 'App\Http\Controllers\OrderController@index');
Route::post('/orders', 'App\Http\Controllers\OrderController@store');
Route::delete('/orders', 'App\Http\Controllers\OrderController@destroy');
